<x-mail::message>
  # Our New Team Member/ {{ $details['staff'] }}

  Welcome To our platform,<br />
  <strong>Your Login E-mail:</strong><span>{{ $details['email'] }}</span><br />
  <strong>Your Password Is:</strong><span>{{ $details['pass'] }}</span><br />

  Click the button to Login to your Dashboard

  <x-mail::button :url="$url">
    Click Here
  </x-mail::button>

  Thanks,<br>
  Towers-uae Team Admin,
</x-mail::message>