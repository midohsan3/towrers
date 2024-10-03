<x-mail::message>
  # Dear/ {{ $details['company_name'] }}

  Welcome To our platform,<br />
  <strong>Your Login E-mail:</strong><span>{{ $details['email'] }}</span><br />
  <strong>Your Password Is:</strong><span>{{ $details['pass'] }}</span><br />

  Click the button to complete your Profile

  <x-mail::button :url="$url">
    Click Here
  </x-mail::button>

  Thanks,<br>
  Towers-uae Team,
</x-mail::message>