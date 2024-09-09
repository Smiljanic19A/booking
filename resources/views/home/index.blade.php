@extends("layout")
@section("content")
    @if(\Illuminate\Support\Facades\Session::has('guestWarning'))
        <p>
            {{\Illuminate\Support\Facades\Session::get("guestWarning")}}
            <button onclick="continueAsGuest()">
                Continue As Guest?
            </button>
        </p>
    @endif
    <button onclick="window.location.href = '{{ route('auth.vendor') }}'">Sign Up As A Vendor</button>
    <button onclick="window.location.href = '{{ route('auth.user') }}' ">Sign Up As A User</button>
    <button onclick="window.location.href='{{ route('home.guest') }}'">Continue As Guest</button>
    <br>
    <button onclick="window.location.href = '{{ route('auth.vendor.login') }}'">Login As A Vendor</button>
    <button onclick="window.location.href = '{{ route('auth.user.login') }}' ">Login As A User</button>
@endsection

<script>
    let baseUrl = "http://127.0.0.1:8000/"
    function generateUniqueString(length = 16) {
        const charset = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!@#$%^&*()_+-=[]{}|;:,.<>?';
        let result = '';
        const crypto = window.crypto || window.msCrypto; // For modern browsers

        if (crypto && crypto.getRandomValues) {
            const values = new Uint8Array(length);
            crypto.getRandomValues(values);

            for (let i = 0; i < length; i++) {
                result += charset[values[i] % charset.length];
            }
        } else {
            // Fallback for environments where crypto.getRandomValues is not available
            for (let i = 0; i < length; i++) {
                result += charset[Math.floor(Math.random() * charset.length)];
            }
        }

        return result;
    }

    function continueAsGuest(){
        let uniqueId = localStorage.getItem("unique_id");
        if (uniqueId === null) {
           uniqueId = generateUniqueString()
        }
        console.log(uniqueId)
        localStorage.setItem("unique_id", uniqueId);

        window.location.href = baseUrl + "authenticateGuest/" + uniqueId;
    }

</script>
