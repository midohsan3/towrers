<x-mail::message>
  # Dear/ Admin

  New Company Registered <br />
  <strong>CompanyName:</strong><span>{{ $details['company_name'] }}</span>

  <x-mail::button :url="$url">
    Check
  </x-mail::button>

  Thanks,<br>
  Towersuae Team,
</x-mail::message>