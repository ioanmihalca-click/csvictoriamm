<?php

namespace App\Filament\Forms\Components;

use App\Services\KeywordAnalyzer;
use Filament\Forms\Components\Component;
use Filament\Forms\Components\Concerns\HasState;
use Filament\Forms\Components\Contracts\HasState as HasStateContract;

class KeywordAnalysisField extends Component implements HasStateContract
{
    use HasState;

    protected string $view = 'filament.forms.components.keyword-analysis';

    public static function make(string $name): static
    {
        $static = app(static::class, ['name' => $name]);
        $static->configure();

        return $static;
    }

    public function getKeywordAnalysis(): array
    {
        $record = $this->getRecord();
        if (!$record || !$record->exists) {
            return $this->getEmptyAnalysis();
        }

        // If we have cached analysis, use it
        if ($record->keyword_analysis && $record->focus_keyword) {
            return $record->keyword_analysis;
        }

        // If we have a focus keyword, analyze it
        if ($record->focus_keyword) {
            $analyzer = new KeywordAnalyzer();
            return $analyzer->analyze($record);
        }

        return $this->getEmptyAnalysis();
    }

    protected function getEmptyAnalysis(): array
    {
        return [
            'keyword' => '',
            'density' => 0,
            'score' => 0,
            'analysis' => [
                'density' => ['value' => 0, 'optimal' => false, 'message' => 'No keyword set'],
                'in_title' => ['found' => false, 'message' => 'No keyword set'],
                'in_slug' => ['found' => false, 'message' => 'No keyword set'],
                'in_meta_description' => ['found' => false, 'message' => 'No keyword set'],
                'in_first_paragraph' => ['found' => false, 'message' => 'No keyword set'],
                'distribution' => ['good' => false, 'message' => 'No keyword set']
            ],
            'suggestions' => [],
            'related_keywords' => []
        ];
    }

    public function analyzeKeyword(string $keyword): array
    {
        $record = $this->getRecord();
        if (!$record || !$record->exists) {
            return $this->getEmptyAnalysis();
        }

        $analyzer = new KeywordAnalyzer();
        return $analyzer->analyzeAndSave($record, $keyword);
    }
}