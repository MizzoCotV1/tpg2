
    function usernameexist(){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Username sudah dipakai!',
        })
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
