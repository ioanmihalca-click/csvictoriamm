@php
    $analysis = $getKeywordAnalysis();
    $keyword = $analysis['keyword'] ?? '';
    $density = $analysis['density'] ?? 0;
    $score = $analysis['score'] ?? 0;
    $checks = $analysis['analysis'] ?? [];
    $suggestions = $analysis['suggestions'] ?? [];
    $relatedKeywords = $analysis['related_keywords'] ?? [];
@endphp

<div x-data="{
    showAnalysis: {{ $keyword ? 'true' : 'false' }},
    analyzing: false,
    analyzeKeyword() {
        const keyword = document.querySelector('input[name=\'focus_keyword\']')?.value;
        if (!keyword) {
            alert('Please enter a focus keyword first');
            return;
        }
        this.analyzing = true;
        // Trigger form save to run analysis
        $wire.call('save').then(() => {
            this.analyzing = false;
            this.showAnalysis = true;
        });
    }
}" class="fi-fo-field-wrp">
    <div class="space-y-4">
        {{-- Analysis Header --}}
        <div class="flex items-center justify-between">
            <h3 class="text-base font-semibold text-gray-900 dark:text-white">Keyword Analysis</h3>

            @if($keyword)
                <div class="flex items-center space-x-4">
                    <span class="text-sm text-gray-600">
                        Score:
                        <span class="font-bold
                            @if($score >= 80) text-success-600
                            @elseif($score >= 60) text-warning-600
                            @else text-danger-600
                            @endif">
                            {{ $score }}%
                        </span>
                    </span>
                    <button
                        type="button"
                        @click="analyzeKeyword()"
                        :disabled="analyzing"
                        class="text-sm text-primary-600 hover:text-primary-500 font-medium disabled:opacity-50">
                        <svg x-show="analyzing" class="animate-spin w-4 h-4 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                        </svg>
                        Re-analyze
                    </button>
                </div>
            @else
                <button
                    type="button"
                    @click="analyzeKeyword()"
                    :disabled="analyzing"
                    class="text-sm bg-primary-600 text-white px-3 py-1 rounded hover:bg-primary-500 disabled:opacity-50">
                    <svg x-show="analyzing" class="animate-spin w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                    </svg>
                    Analyze Keyword
                </button>
            @endif
        </div>

        @if($keyword)
            {{-- Keyword Density --}}
            <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-4">
                <div class="flex items-center justify-between mb-2">
                    <span class="text-sm font-medium text-gray-700 dark:text-gray-300">
                        Keyword Density
                    </span>
                    <span class="text-sm font-bold
                        @if($density >= 1.5 && $density <= 3.5) text-success-600
                        @elseif($density >= 1 && $density <= 4) text-warning-600
                        @else text-danger-600
                        @endif">
                        {{ $density }}%
                    </span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2">
                    <div class="h-2 rounded-full
                        @if($density >= 1.5 && $density <= 3.5) bg-success-500
                        @elseif($density >= 1 && $density <= 4) bg-warning-500
                        @else bg-danger-500
                        @endif"
                        style="width: {{ min(100, $density * 20) }}%">
                    </div>
                </div>
                <p class="text-xs text-gray-500 mt-1">
                    Optimal range: 1.5% - 3.5%
                </p>
            </div>

            {{-- Analysis Checklist --}}
            <div x-show="showAnalysis" class="space-y-2">
                <h4 class="text-sm font-semibold text-gray-700 dark:text-gray-300">Keyword Placement</h4>

                @foreach(['in_title' => 'In Title', 'in_slug' => 'In URL', 'in_meta_description' => 'In Meta Description', 'in_first_paragraph' => 'In First Paragraph'] as $key => $label)
                    @if(isset($checks[$key]))
                        <div class="flex items-center space-x-2">
                            @if($checks[$key]['found'] ?? false)
                                <svg class="w-5 h-5 text-success-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            @else
                                <svg class="w-5 h-5 text-danger-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            @endif
                            <span class="text-sm text-gray-700 dark:text-gray-300">{{ $label }}</span>
                            @if(isset($checks[$key]['at_beginning']) && $checks[$key]['at_beginning'])
                                <span class="text-xs text-success-600 font-medium">(at beginning)</span>
                            @endif
                        </div>
                    @endif
                @endforeach

                @if(isset($checks['distribution']))
                    <div class="flex items-center space-x-2">
                        @if($checks['distribution']['good'] ?? false)
                            <svg class="w-5 h-5 text-success-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        @else
                            <svg class="w-5 h-5 text-warning-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        @endif
                        <span class="text-sm text-gray-700 dark:text-gray-300">
                            {{ $checks['distribution']['message'] ?? 'Distribution' }}
                        </span>
                    </div>
                @endif
            </div>

            {{-- Suggestions --}}
            @if(count($suggestions) > 0)
                <div class="border-t pt-4">
                    <h4 class="text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Suggestions</h4>
                    <ul class="space-y-1">
                        @foreach($suggestions as $suggestion)
                            <li class="flex items-start space-x-2">
                                <span class="text-{{ $suggestion['priority'] === 'high' ? 'danger' : 'warning' }}-500 mt-0.5">•</span>
                                <span class="text-sm text-gray-600 dark:text-gray-400">
                                    {{ $suggestion['message'] }}
                                </span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Related Keywords --}}
            @if(count($relatedKeywords) > 0)
                <div class="border-t pt-4">
                    <h4 class="text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Related Keywords Found</h4>
                    <div class="flex flex-wrap gap-2">
                        @foreach($relatedKeywords as $related)
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-200">
                                {{ $related['keyword'] }}
                                <span class="ml-1 text-gray-500">({{ $related['count'] }}x)</span>
                            </span>
                        @endforeach
                    </div>
                </div>
            @endif
        @else
            {{-- No keyword set message --}}
            <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-4 text-center">
                <svg class="w-12 h-12 mx-auto text-gray-400 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
                <p class="text-sm text-gray-600 dark:text-gray-400">
                    Enter a focus keyword above and click "Analyze Keyword" to get optimization suggestions.
                </p>
            </div>
        @endif
    </div>
</div>