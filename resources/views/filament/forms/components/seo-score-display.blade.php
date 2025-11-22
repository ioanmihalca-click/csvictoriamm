@php
    $analysis = $getAnalysis();
    $score = $analysis['score'] ?? 0;
    $level = $analysis['level'] ?? 'Not analyzed';
    $color = $analysis['color'] ?? 'gray';
    $checks = $analysis['analysis'] ?? [];
    $recommendations = $analysis['recommendations'] ?? [];
@endphp

<div x-data="{
    showDetails: false,
    refreshing: false,
    refresh() {
        this.refreshing = true;
        // Trigger form save to recalculate
        $wire.call('save').then(() => {
            this.refreshing = false;
        });
    }
}" class="fi-fo-field-wrp">
    <div class="space-y-4">
        {{-- Score Header --}}
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-4">
                <div class="relative">
                    {{-- Score Circle --}}
                    <div class="w-20 h-20 rounded-full flex items-center justify-center text-2xl font-bold
                        @if($score >= 80) bg-success-100 text-success-700 ring-4 ring-success-200
                        @elseif($score >= 60) bg-warning-100 text-warning-700 ring-4 ring-warning-200
                        @else bg-danger-100 text-danger-700 ring-4 ring-danger-200
                        @endif">
                        {{ $score }}
                    </div>
                </div>

                <div>
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">SEO Score</h3>
                    <p class="text-sm
                        @if($score >= 80) text-success-600
                        @elseif($score >= 60) text-warning-600
                        @else text-danger-600
                        @endif">
                        {{ $level }}
                    </p>
                </div>
            </div>

            <div class="flex space-x-2">
                <button
                    type="button"
                    @click="showDetails = !showDetails"
                    class="text-sm text-primary-600 hover:text-primary-500 font-medium">
                    <span x-show="!showDetails">Show Details</span>
                    <span x-show="showDetails">Hide Details</span>
                </button>

                <button
                    type="button"
                    @click="refresh()"
                    :disabled="refreshing"
                    class="text-sm text-gray-600 hover:text-gray-500 font-medium disabled:opacity-50">
                    <svg x-show="!refreshing" class="w-4 h-4 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                    </svg>
                    <svg x-show="refreshing" class="animate-spin w-4 h-4 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                    </svg>
                    Refresh
                </button>
            </div>
        </div>

        {{-- Checklist --}}
        <div x-show="showDetails" x-collapse class="border-t pt-4">
            <div class="space-y-2">
                <h4 class="text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">SEO Checklist</h4>

                @foreach($checks as $key => $check)
                    <div class="flex items-start space-x-2">
                        @if($check['passed'] ?? false)
                            <svg class="w-5 h-5 text-success-500 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        @elseif($check['partial'] ?? false)
                            <svg class="w-5 h-5 text-warning-500 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        @else
                            <svg class="w-5 h-5 text-danger-500 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        @endif

                        <div class="flex-1">
                            <p class="text-sm text-gray-700 dark:text-gray-300">
                                {{ $check['message'] ?? 'Checking...' }}
                            </p>
                            @if(isset($check['value']))
                                <p class="text-xs text-gray-500 mt-0.5">
                                    Current: {{ $check['value'] }}
                                </p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Recommendations --}}
            @if(count($recommendations) > 0)
                <div class="mt-4 pt-4 border-t">
                    <h4 class="text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">Recommendations</h4>
                    <ul class="space-y-2">
                        @foreach($recommendations as $rec)
                            <li class="flex items-start space-x-2">
                                <span class="text-warning-500 mt-1">•</span>
                                <span class="text-sm text-gray-600 dark:text-gray-400">
                                    {{ $rec['message'] }}
                                </span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
</div>