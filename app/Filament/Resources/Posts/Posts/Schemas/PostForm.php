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
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([

            /* =====================
             | Post Content
             ===================== */
            Section::make('Post Composition')
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
                        ->unique(Post::class, 'slug', ignoreRecord: true),

                    RichEditor::make('content')
                        ->required()
                        ->columnSpanFull()
                        ->toolbarButtons([
                            'bold',
                            'italic',
                            'underline',
                            'strike',
                            'h2',
                            'h3',
                            'bulletList',
                            'orderedList',
                            'link',
                            'blockquote',
                            'codeBlock',
                            'table',
                            'undo',
                            'redo',
                        ])
                        ->fileAttachmentsDirectory('blog/attachments'),

                    Textarea::make('excerpt')
                        ->rows(3)
                        ->columnSpanFull(),
                ]),

            /* =====================
             | Media & Category
             ===================== */
            Section::make('Media & Classification')
                ->schema([

                    FileUpload::make('cover_image')
                        ->label('Cover Image')
                        ->image()
                        ->disk('public')
                        ->directory('blog/covers')
                        ->maxSize(5120) // 5MB upload allow
                        ->saveUploadedFileUsing(function ($file) {

                            $manager = new ImageManager(new Driver());

                            $filename = Str::random(40) . '.jpg';
                            $path = 'blog/covers/' . $filename;

                            $image = $manager
                                ->read($file->getRealPath())
                              //  ->cover(1200, 630) // resize + crop
                                ->toJpeg(60);      // 🔥 EXACT 70% quality

                            $image->save(
                                storage_path('app/public/' . $path)
                            );

                            return $path;
                        }),

                    Grid::make(2)->schema([

                        Select::make('category_id')
                            ->relationship('category', 'name')
                            ->required(),

                        Select::make('user_id')
                            ->relationship('user', 'name')
                            ->default(Auth::id())
                            ->required(),
                    ]),
                ]),

            /* =====================
             | Publishing
             ===================== */
            Section::make('Publishing')
                ->schema([

                    Grid::make(2)->schema([

                        Toggle::make('is_published')
                            ->live()
                            ->afterStateUpdated(
                                fn ($state, Set $set) =>
                                    $state ? $set('published_at', now()) : null
                            ),

                        DateTimePicker::make('published_at')
                            ->native(false),
                    ]),
                ]),
        ]);
    }
}
