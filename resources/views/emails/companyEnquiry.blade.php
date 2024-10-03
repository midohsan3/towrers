<x-mail::message>
  # Dear/ {{ $details['company'] }}

  You Have New Enquiry about {{ $details['subject'] }}

  <x-mail::button :url="$url">
    Check
  </x-mail::button>

  Thanks,<br>
  Towers-uae Team,
</x-mail::message>