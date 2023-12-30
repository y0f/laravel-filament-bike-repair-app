<x-filament-widgets::widget class="fi-filament-info-widget">
    <x-filament::section>
        <div class="flex items-center gap-x-3">
            <div class="flex-1">
                <p class="mt-2 text-xl text-gray-500 dark:text-gray-400">
                    BikeHub
                </p>
            </div>

            <div class="flex flex-col items-end gap-y-1">
                <x-filament::link color="gray" href="#" icon="heroicon-m-book-open"
                    icon-alias="panels::widgets.filament-info.open-documentation-button" rel="noopener noreferrer"
                    target="_blank">
                    {{ __('FAQ') }}
                </x-filament::link>
                {{-- TODO: Add custom links, link-icons and other content here. --}}
                <x-filament::link color="gray" href="https://github.com/filamentphp/filament"
                    icon-alias="panels::widgets.filament-info.open-github-button" rel="noopener noreferrer"
                    target="_blank">
                    <x-slot name="icon">
                        <svg viewBox="0 0 98 96" xmlns="http://www.w3.org/2000/svg">
                            <path clip-rule="evenodd" fill="currentColor" fill-rule="evenodd"
                                d="M48.854 0C21.839 0 0 22 0 49.217c0 21.756 13.993 40.172 33.405 46.69 2.427.49 3.316-1.059 3.316-2.362 0-1.141-.08-5.052-.08-9.127-13.59 2.934-16.42-5.867-16.42-5.867-2.184-5.704-5.42-7.17-5.42-7.17-4.448-3.015.324-3.015.324-3.015 4.934.326 7.523 5.052 7.523 5.052 4.367 7.496 11.404 5.378 14.235 4.074.404-3.178 1.699-5.378 3.074-6.6-10.839-1.141-22.243-5.378-22.243-24.283 0-5.378 1.94-9.778 5.014-13.2-.485-1.222-2.184-6.275.486-13.038 0 0 4.125-1.304 13.426 5.052a46.97 46.97 0 0 1 12.214-1.63c4.125 0 8.33.571 12.213 1.63 9.302-6.356 13.427-5.052 13.427-5.052 2.67 6.763.97 11.816.485 13.038 3.155 3.422 5.015 7.822 5.015 13.2 0 18.905-11.404 23.06-22.324 24.283 1.78 1.548 3.316 4.481 3.316 9.126 0 6.6-.08 11.897-.08 13.526 0 1.304.89 2.853 3.316 2.364 19.412-6.52 33.405-24.935 33.405-46.691C97.707 22 75.788 0 48.854 0z" />
                        </svg>
                    </x-slot>

                    {{ __('filament-panels::widgets/filament-info-widget.actions.open_github.label') }}
                </x-filament::link>
            </div>
        </div>
    </x-filament::section>
</x-filament-widgets::widget>
