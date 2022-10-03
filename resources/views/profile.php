<?php include_once("components/header.php") ?>
<?php 
    $user_profile = $data;

    $profile_photo = "img/blank-profile-pic.png";
    if($user_profile->profile_photo !== null) {
        $profile_photo = $user_profile->profile_photo;
    }
    // $cover_photo = "";
    $cover_photo = "background-image: url('img/lasagna.jpg')";
    if($user_profile->cover_photo !== null) {
        $cover_photo = "background-image: url('".$user_profile->cover_photo."')";
    }
?>

<style>
    .gradient-custom-2 {
        /* fallback for old browsers */
        background: #002147;

        /* Chrome 10-25, Safari 5.1-6 */
        background: -webkit-linear-gradient(to right, rgba(251, 194, 235, 1), rgba(166, 193, 238, 1));

        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        background: linear-gradient(to left, rgba(11, 10, 15, 0.4), rgba(0, 33, 71, 1), rgba(11, 10, 15, 0.6))
    }

    @media only screen and (min-width: 425px) {
        .profile-img {
            margin-top: 10vh !important;
        }
    }
</style>

    <body class="brand-bg-primary">
        <?php include_once("components/navbar.php") ?>

    <section class="h-100 gradient-custom-2">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-lg-9 col-xl-7">
                <div class="card">
                    <div class="d-flex flex-column ">
                        <div class="pt-5 px-2 rounded-top text-white d-flex" 
                            style="background-color: #000; <?php echo $cover_photo ?>; height:100%; max-height: 200px; width: 100%; background-size: cover; background-position: center; background-repeat: no-repeat;">
                            <div class="d-flex flex-column justify-content-between mt-5 ms-1 ms-md-3 ms-lg-5" style="z-index: 10;">
                                <img src="<?php echo $profile_photo ?>"
                                    alt="Generic placeholder image" class="profile-img img-fluid img-thumbnail mb-2 rounded-circle"
                                    style="width: 20vw; max-width: 100px; height: 25vw; z-index: 1; margin-top: 16vh;">
                                <div class="d-flex flex-column">
                                    <span class="h5" style="font-size: 1.1em !important;"><?php echo $user_profile->first_name . ' ' . $user_profile->last_name ?></span>
                                    <span class="text-muted h6">@<?php echo $user_profile->username ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="p-4 text-white d-flex flex-column pe-2 pe-md-3 pe-lg-5" style="background-color: #002147;">
                            <button type="button" onclick="location = '/edit-profile'" class="w-auto align-self-end mb-3 btn btn-outline-light text-capitalize" data-mdb-ripple-color="white"
                                style="z-index: 1;">Edit profile
                            </button>
                            <div class="d-flex justify-content-end text-center py-1">
                                <div>
                                    <p class="mb-1 h6">253</p>
                                    <p class="small text-muted mb-0">Quots</p>
                                </div>
                                <div class="px-3">
                                    <p class="mb-1 h6">1026</p>
                                    <p class="small text-muted mb-0">Followers</p>
                                </div>
                                <div>
                                    <p class="mb-1 h6">478</p>
                                    <p class="small text-muted mb-0">Following</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-4 text-white">
                        <div class="mb-5">
                            <p class="lead fw-normal mb-1 text-black">Bio</p>
                            <div class="p-4 rounded" style="background-color: #002147;">
                                <p class="font-italic mb-1">Web Developer</p>
                                <p class="font-italic mb-1">Lives in New York</p>
                                <p class="font-italic mb-0">Photographer</p>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <p class="lead fw-normal mb-0 text-black">Recent quots</p>
                            <p class="mb-0"><a href="#!" class="text-muted">Show all</a></p>
                        </div>
                        <div class="row g-2">
                            <div class="col mb-2">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/Lightbox/Original/img%20(112).webp"
                                alt="image 1" class="w-100 rounded-3">
                            </div>
                            <div class="col mb-2">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/Lightbox/Original/img%20(107).webp"
                                alt="image 1" class="w-100 rounded-3">
                            </div>
                            </div>
                            <div class="row g-2">
                            <div class="col">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/Lightbox/Original/img%20(108).webp"
                                alt="image 1" class="w-100 rounded-3">
                            </div>
                            <div class="col">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/Lightbox/Original/img%20(114).webp"
                                alt="image 1" class="w-100 rounded-3">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </section>
</body>
</html>