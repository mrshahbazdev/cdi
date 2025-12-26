<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Tool;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Str;

class ToolController extends Controller
{
    public function index(Request $request): View
    {
        $search = $request->get('search');
        $page = $request->get('page', 1);

        $tools = Tool::with(['packages' => function ($query) {
            $query->where('status', true)->orderBy('price');
        }])
            ->where('status', true)
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                      ->orWhere('domain', 'like', "%{$search}%")
                      ->orWhere('description', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->paginate(12);

        // Dynamische SEO-Daten für die Index-Seite
        $pageSuffix = $page > 1 ? " – Seite $page" : "";
        $seoTitle = "Digital Packt – Professional SaaS Platform" . $pageSuffix;
        $seoDescription = "Entdecken Sie unsere Hochleistungs-Entwickler-Tools und Automatisierungslösungen" . $pageSuffix;

        return view('user.tools.index', compact('tools', 'seoTitle', 'seoDescription'));
    }

    public function show(Tool $tool): View
    {
        if (!$tool->status) {
            abort(404);
        }

        $tool->load(['packages' => function ($query) {
            $query->where('status', true)->orderBy('price');
        }]);

        $hasActiveSubscription = false;
        if (auth()->check()) {
            $hasActiveSubscription = auth()->user()
                ->activeSubscriptions()
                ->whereHas('package', function ($query) use ($tool) {
                    $query->where('tool_id', $tool->id);
                })
                ->exists();
        }

        // SEO für die Detailseite
        $seoTitle = $tool->name . " – Professionelles Entwickler-Tool | Digital Packt";
        $seoDescription = Str::limit(strip_tags($tool->description), 150);

        return view('user.tools.show', compact('tool', 'hasActiveSubscription', 'seoTitle', 'seoDescription'));
    }
}