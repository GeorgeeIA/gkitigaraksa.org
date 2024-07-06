  <!-- info section -->
  <section class="info_section layout_padding2">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-3 info_col">
                <div class="info_contact">
                    <h4>Address</h4>
                    <div class="contact_link_box">
                        <a href="">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            <span> Jl. Raya Pemda Tigaraksa – Ruko AN 33 No.40-41 </span>
                        </a>
                        <a href="">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                            <span> +62 81392934246 </span>
                        </a>
                        <a href="">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                            <span> demo@gmail.com </span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 info_col">
                <div class="info_detail">
                    <h4>Info</h4>
                    <p>
                        necessary, making this the first true generator on the Internet.
                        It uses a dictionary of over 200 Latin words, combined with a
                        handful
                    </p>
                </div>
            </div>
            <div class="col-md-6 col-lg-2 mx-auto info_col">
                <div class="info_link_box">
                    <h4>Links</h4>
                    <div class="info_links">
                        <a class="active" href="{{ route('front.index') }}">
                            <img src="images/nav-bullet.png" alt="" />
                            Home
                        </a>
                        <a class="" href="{{ route('front.about') }}">
                            <img src="images/nav-bullet.png" alt="" />
                            About
                        </a>
                        <a class="" href="{{ route('front.warta') }}">
                            <img src="images/nav-bullet.png" alt="" />
                            Warta
                        </a>

                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 info_col">
                <h4>Location Gmaps</h4>
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.9208461460207!2d106.48416689999999!3d-6.274138199999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e420700066f1d0b%3A0x72940fff66f1c2a0!2sGKI%20SulSel%20Pos%20Tigaraksa!5e0!3m2!1sid!2sid!4v1714726485290!5m2!1sid!2sid"
                    width="cover" height="200" style="border: 0" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</section>
<!-- end info section -->

<!-- footer section -->
<section class="footer_section">
    <div class="container">
        <p>
            &copy; <span id="displayYear"></span> All Rights Reserved By
            <a href="https://html.design/">GKI Tigaraksa</a>
        </p>
    </div>
</section>
<!-- footer section -->

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
<script src="{{ asset('front/asset/js/jquery.slicknav.js') }}"></script>
<script src="{{ asset('front/asset/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('front/asset/js/main.js') }}"></script>
<script>
    // Mengatur perilaku dropdown
    $(".dropdown-toggle").on("click", function (e) {
      if (!$(this).next().hasClass("show")) {
        $(this)
          .parents(".dropdown-menu")
          .first()
          .find(".show")
          .removeClass("show");
      }
      var $subMenu = $(this).next(".dropdown-menu");
      $subMenu.toggleClass("show");

      $(this)
        .parents("li.nav-item.dropdown.show")
        .on("hidden.bs.dropdown", function (e) {
          $(".dropdown-submenu .show").removeClass("show");
        });

      return false;
    });
  </script>
@yield('js')
