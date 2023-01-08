<header>
    <h1 class="header-title">Wenzzi Currency Converter v1.0</h1>
</header>
<div class="container">
    <form wire:submit.prevent="convert">
        <label for="amount">Enter amount:</label><br>
        <input type="text" id="amount" wire:model="amount"><br>
        @error('amount') <span class="error">{{ $message }}</span> @enderror<br>
        <label for="from">Convert from:</label><br>
        <select id="from" wire:model="from">
        @foreach ($currencies as $code => $currency)
            <option value="{{ $code }}">{{ $code }} ({{ $currency }})</option>
        @endforeach
        </select><br>
        @error('from') <span class="error">{{ $message }}</span> @enderror<br>
        <label for="to">Convert to:</label><br>
        <select id="to" wire:model="to">
        @foreach ($currencies as $code => $currency)
            <option value="{{ $code }}">{{ $code }}  ({{ $currency }})</option>
        @endforeach
        </select><br>
        @error('to') <span class="error">{{ $message }}</span> @enderror<br><br>
        <button type="submit">Convert</button>
      </form>
      
      @if ($result)
        <p class="result">Result: {{ $result }} {{ $to }}</p>
      @endif
</div>
