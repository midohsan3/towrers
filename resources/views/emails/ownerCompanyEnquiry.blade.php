<x-mail::message>
  # Dear/ Admin

  The Company {{ $details['company'] }} got New Enquiry about:<br />
  {{ $details['subject'] }}

  <x-mail::button :url="$url">
    Check
  </x-mail::button>
  Thanks,<br>
  Towers-uae Team,
</x-mail::message>