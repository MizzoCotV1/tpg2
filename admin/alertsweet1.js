
    function logingagal(){
        setTimeout(function() {
            swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Login Gagal',
            }, function() {
                window.location = "http://localhost/terput2/dist/admin/login.php";
            });
        }, );
    };
    function formkosong(){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Form kosong',
        })
    };
    function cpassworderror(){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Password tidak sama!',
        })
    };
    function kesalahan(){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Terjadi Kesalahan',
        })
    };
