<div>
    <header class="header">
        <form action="{{ route('language.change') }}" method="POST" class="language-form">
            @csrf
            <select name="locale" onchange="this.form.submit()">
              @foreach(config('app.locales') as $locale)
                <option value="{{ $locale }}" {{ $locale === app()->getLocale() ? 'selected' : '' }}>
                  {{ ucfirst($locale) }}
                </option>
              @endforeach
            </select>
        </form>
        <h1 class="header-title">Wenzzi {{ __('app.currency_converter') }} v1.0</h1>
    </header>
    <div class="container">
        <form wire:submit.prevent="convert">
            <label for="amount">{{ __('app.amount') }}:</label><br>
            <input type="text" id="amount" wire:model="amount"><br>
            @error('amount') <span class="error">{{ $message }}</span> @enderror<br>
            <label for="from">{{ __('app.from') }}:</label><br>
            <select id="from" wire:model="from">
            @foreach ($currencies as $code => $currency)
                <option value="{{ $code }}">{{ $code }} ({{ $currency }})</option>
            @endforeach
            </select><br>
            @error('from') <span class="error">{{ $message }}</span> @enderror<br>
            <label for="to">{{ __('app.to') }}:</label><br>
            <select id="to" wire:model="to">
            @foreach ($currencies as $code => $currency)
                <option value="{{ $code }}">{{ $code }}  ({{ $currency }})</option>
            @endforeach
            </select><br>
            @error('to') <span class="error">{{ $message }}</span> @enderror<br><br>
            <button type="submit">{{ __('app.convert') }}</button>
        </form>
        
        @if ($result)
            <p class="result">{{ __('app.result') }}: {{ $result }} {{ $to }}</p>
        @endif
    </div>
</div>
