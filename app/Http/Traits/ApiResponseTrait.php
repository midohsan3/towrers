<?php

namespace App\Http\Traits;


trait ApiResponseTrait
{
  public function ApiResponse($status = null, $data = null)
  {
    $array = [
      'status' => $status,
      'data' => $data,
    ];
    return response()->json($status, $array);
  }
}
