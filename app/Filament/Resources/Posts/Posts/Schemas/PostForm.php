<?php

namespace App\Filament\Resources\Posts\Posts\Schemas;

use App\Models\Post;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Grid;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\DateTimePicker;
use Filament\Schemas\Components\Utilities\Set;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class PostForm
{
    /**
     * Full Post Form Schema (Filament v4)
     * Includes extended RichEditor toolbar
     */
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                /*
                |--------------------------------------------------------------------------
                | Post Content
                |--------------------------------------------------------------------------
                */
                Section::make('Post Composition')
                    ->description('Write your article content and SEO data.')
                    ->schema([

                        TextInput::make('title')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(
                                fn (string $operation, $state, Set $set) =>
                                    $operation === 'create'
                                        ? $set('slug', Str::slug($state))
                                        : null
                            ),

                        TextInput::make('slug')
                            ->disabled()
                            ->dehydrated()
                            ->required()
                            ->maxLength(255)
                            ->unique(Post::class, 'slug', ignoreRecord: true)
                            ->helperText('Slug title se auto generate hota hai.'),

                        RichEditor::make('content')
                            ->required()
                            ->columnSpanFull()
                            ->toolbarButtons([

                                // Files
                                'attachFiles',

                                // Text formatting
                                'bold',
                                'italic',
                                'underline',
                                'strike',
                                'subscript',
                                'superscript',
                                'clearFormatting',

                                // Headings
                                'h1',
                                'h2',
                                'h3',
                                'h4',

                                // Lists
                                'bulletList',
                                'orderedList',

                                // Alignment
                                'alignLeft',
                                'alignCenter',
                                'alignRight',
                                'alignJustify',

                                // Media
                                'link',
                                'image',
                                'video',

                                // Blocks
                                'blockquote',
                                'horizontalRule',

                                // Code
                                'code',
                                'codeBlock',

                                // Tables
                                'table',

                                // History
                                'undo',
                                'redo',
                            ])
                            ->fileAttachmentsDirectory('blog/attachments'),

                        Textarea::make('excerpt')
                            ->label('Meta Description')
                            ->placeholder('SEO ke liye short description...')
                            ->rows(3)
                            ->columnSpanFull(),
                    ]),

                /*
                |--------------------------------------------------------------------------
                | Media & Classification
                |--------------------------------------------------------------------------
                */
                Section::make('Media & Classification')
                    ->schema([

                        FileUpload::make('cover_image')
                            ->label('Featured Image')
                            ->image()
                            ->directory('blog/covers')
                            ->imageEditor()
                            ->imageEditorAspectRatios([
                                '16:9',
                                '4:3',
                                '1:1',
                            ]),

                        Grid::make(2)
                            ->schema([

                                Select::make('category_id')
                                    ->relationship('category', 'name')
                                    ->searchable()
                                    ->preload()
                                    ->required(),

                                Select::make('user_id')
                                    ->relationship('user', 'name')
                                    ->label('Author')
                                    ->default(Auth::id())
                                    ->required()
                                    ->helperText('Default: current user'),
                            ]),
                    ]),

                /*
                |--------------------------------------------------------------------------
                | Publishing
                |--------------------------------------------------------------------------
                */
                Section::make('Publishing Protocols')
                    ->schema([

                        Grid::make(2)
                            ->schema([

                                Toggle::make('is_published')
                                    ->label('Publish')
                                    ->helperText('On = Live, Off = Draft')
                                    ->live()
                                    ->afterStateUpdated(function ($state, Set $set) {
                                        if ($state) {
                                            $set('published_at', now());
                                        }
                                    }),

                                DateTimePicker::make('published_at')
                                    ->label('Publish Date')
                                    ->placeholder('Schedule post')
                                    ->native(false),
                            ]),
                    ]),
            ]);
    }
}
