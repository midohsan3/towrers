<x-mail::message>
  # Dear/ Admin

  New Company Registered <br />
  <strong>CompanyName:</strong><span>{{ $details['person'] }}</span>

  <x-mail::button :url="$url">
    Check
  </x-mail::button>

  Thanks,<br>
  Towersuae Team,
</x-mail::message>