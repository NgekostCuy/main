{{-- ini adalah tampilan email yang dikirimkan --}}
<div class="container"style="text-align: center">
    <h2>Silahkan Reset Password Anda Melalui Link Dibawah Ini</h1>
  
    <button style="background-color: #0d9488; border: none; border-radius: 100px; padding:16px">
      <a style="color: white; text-decoration: none;" href="{{ route('validation-forgot-password',['token' => $token]) }}">
        Reset Password
    </a>
    </button>
    
  </div>
  
  
  
  