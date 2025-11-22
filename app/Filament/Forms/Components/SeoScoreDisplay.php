<?php

namespace App\Filament\Forms\Components;

use App\Services\SeoScoreService;
use Filament\Forms\Components\Component;
use Filament\Forms\Components\Concerns\HasState;
use Filament\Forms\Components\Contracts\HasState as HasStateContract;

class SeoScoreDisplay extends Component implements HasStateContract
{
    use HasState;

    protected string $view = 'filament.forms.components.seo-score-display';

    public static function make(string $name): static
    {
        $static = app(static::class, ['name' => $name]);
        $static->configure();

        return $static;
    }

    public function getScore(): int
    {
        $record = $this->getRecord();
        if (!$record || !$record->exists) {
            return 0;
        }

        return $record->seo_score ?? 0;
    }

    public function getAnalysis(): array
    {
        $record = $this->getRecord();
        if (!$record || !$record->exists) {
            return $this->getEmptyAnalysis();
        }

        // If we have cached analysis, use it
        if ($record->seo_analysis) {
            return $record->seo_analysis;
        }

        // Otherwise calculate fresh
        $service = new SeoScoreService();
        return $service->analyze($record);
    }

    protected function getEmptyAnalysis(): array
    {
        return [
            'score' => 0,
            'level' => 'Not analyzed',
            'color' => 'gray',
            'analysis' => [
                'title_length' => ['checked' => false, 'passed' => false, 'message' => 'Not checked yet'],
                'meta_description' => ['checked' => false, 'passed' => false, 'message' => 'Not checked yet'],
                'focus_keyword' => ['checked' => false, 'passed' => false, 'message' => 'Not checked yet'],
                'featured_image' => ['checked' => false, 'passed' => false, 'message' => 'Not checked yet'],
                'content_length' => ['checked' => false, 'passed' => false, 'message' => 'Not checked yet'],
            ],
            'recommendations' => []
        ];
    }

    public function refresh(): void
    {
        $record = $this->getRecord();
        if ($record && $record->exists) {
            $service = new SeoScoreService();
            $service->calculateAndSave($record);
            $record->refresh();
        }
    }
}