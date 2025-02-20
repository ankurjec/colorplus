@section('css')
    @parent
    <style>

.title-contact{
    font-size: 16px;
    font-weight: 600;;
}

.title-contactUs{
    font-size: 28px;
    margin-bottom: 10px;
    font-weight: 600;
}
        .modal-dialog {

            width: 360px;

        }

        .modal-header {

            background-color: #FFF;

            padding: 1px 16px;

            color: #FFF;

            border-bottom: 1px;

        }

        /* Default styles for the site logo */
        .site-logo {
            display: flex;
            align-items: center;
        }

        .site-logo img {
            margin-right: 10px;
        }

        /* Media query for smaller screens */
        @media (max-width: 768px) {
            .site-logo {
                flex-wrap: nowrap;
                justify-content: center;
                text-align: center;
            }

            .site-logo img {
                margin-right: 2px;
                height: 50px;
                width: 50px;
            }

            #zenith_title {
                font-size: 15px !important;
                margin-left: 5px;
            }


            .site-title {
                font-size: 79px;
                margin-left: 25px;
            }
        }
    </style>

@endsection

@extends('layouts.site-header')
@section('content')

    {{-- <div class="site-wrap"> --}}
    {{-- <div class="site-navbar py-2">
    <div class="search-wrap">
      <div class="container">
        <a href="#" class="search-close js-search-close"><span class="icon-close2"></span></a>
        <form action="#" method="post">
          <input type="text" class="form-control" placeholder="Search keyword and hit enter...">
        </form>
      </div>
    </div>

    <div class="container">
      <div class="d-flex align-items-center justify-content-between">
        <a href="/">

          <div class="site-logo">
            <img src="images/z_logo.png" alt="Company Name Logo" href="/" height="75">
            <span id="zenith_title" style="color:rgb(79, 161, 110);font-size:22px;">Zenith Ago Services</span>
          </div>
        </a>
        <div class="main-nav d-none d-lg-block">
          <nav class="site-navigation text-right text-md-center" role="navigation">
            <ul class="site-menu js-clone-nav d-none d-lg-block">
              <li><a href="/">Home</a></li>
              <li><a href="shop">Store</a></li>
              <li class="has-children">
                <a href="#">Products</a>
                <ul class="dropdown">
                  <li><a href="#">Fertilizers</a></li>
                  <li><a href="#">Medicines</a></li>
                  <li><a href="#">Tools</a></li>
                  <li><a href="#">Seeds</a></li>
                </ul>
              </li>
              <li><a href="about">About</a></li>
              <li class="active"><a href="contact">Contact</a></li>
              <li><a href="review">Reviews</a></li>

            </ul>
          </nav>
        </div>
        <div class="icons">
          <a href="#" class="icons-btn d-inline-block" data-toggle="modal" data-target="#myModal"><span
              class="icon-user"></span></a>

          <a href="#" class="icons-btn d-inline-block js-search-open"><span class="icon-search"></span></a>
          <a href="cart.html" class="icons-btn d-inline-block bag">
            {{-- <span class="icon-shopping-bag"></span> --}}
    {{-- </a>
          <livewire:cart-counter />
          <a href="#" class="site-menu-toggle js-menu-toggle ml-3 d-inline-block d-lg-none"><span
              class="icon-menu"></span></a>
        </div>
      </div>
    </div>
  </div> --}}

    <!-- Login/Register Modal -->
    {{-- <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <!-- <h5 class="modal-title" id="loginModalLabel">Login or Register</h5> -->
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <ul class="nav nav-tabs" id="loginTab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="login-tab" data-toggle="tab" href="#login" role="tab" aria-controls="login"
                aria-selected="true">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="register-tab" data-toggle="tab" href="#register" role="tab"
                aria-controls="register" aria-selected="false">Register</a>
            </li>
          </ul>
          <div class="tab-content" id="loginTabContent">
            <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
              <form>
                <br>
                <div class="form-group">
                  <input type="email" class="form-control" id="loginEmail" aria-describedby="emailHelp"
                    placeholder="Enter email">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" id="loginPassword" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Login</button>
              </form>
            </div>
            <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
              <form>
                <br>
                <div class="form-group">
                  <input type="email" class="form-control" id="registerEmail" aria-describedby="emailHelp"
                    placeholder="Enter email">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" id="registerPassword" placeholder="Password">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm Password">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Register</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
 --}}

@section('page-title', 'Contact')

<div class="site-section">

    <div class="container">
        <div class="message-container">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        </div>
        {{-- <div class="row">
                <div class="col-md-12">
                    <h2 class="h3 mb-5 text-black">Get In Touch</h2>
                </div>
                <div class="col-md-12">

                    <form action="{{ route('contact.submit') }}" method="post">
                        @csrf
                        <div class="p-3 p-lg-5 border">
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="c_fname" class="text-black">First Name <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="c_fname" name="c_fname">
                                </div>
                                <div class="col-md-6">
                                    <label for="c_lname" class="text-black">Last Name <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="c_lname" name="c_lname">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="c_email" class="text-black">Email <span
                                            class="text-danger">*</span></label>
                                    <input type="email" class="form-control" id="c_email" name="c_email"
                                        placeholder="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="c_subject" class="text-black">Subject </label>
                                    <input type="text" class="form-control" id="c_subject" name="c_subject">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="c_message" class="text-black">Message </label>
                                    <textarea name="c_message" id="c_message" cols="30" rows="7" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <input type="submit" class="btn btn-primary btn-lg btn-block" value="Send Message">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div> --}}
    </div>
</div>

{{-- New code --}}
<div class="contact-container">
    <div class="contact-heading">
        <h3 class="title-contactUs">Get Into Touch</h3>
        <p class="con-desc">
            Lorem Ipsum has been the industry's standard dummy text ever since the
            1500s, when an unknown printer took a galley of type and scrambled it to
            make
        </p>
    </div>
    <div class="contact-bg">
        <div class="contact-details">
            {{-- <h2 class="title-contact">Contact Information</h2> --}}
            <h2 class="text-2xl font-bold">Contact Information</h2>

            <p class="desc-contact">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas,
                porro? Nesciunt, dolor!
            </p>
            <div class="call-icon">
                <i class="fa-solid fa-phone" style="font-size: 40px"></i>
                <div>
                    <p>01234 56789</p>
                    <p>01234 56789</p>
                </div>
            </div>
            <div class="call-icon">
                <i class="fa-solid fa-envelope" style="font-size: 40px"></i>
                <div>
                    <p>support@domain.com</p>
                    <p>info@domain.com</p>
                </div>
            </div>
            <div class="call-icon">
                <i class="fa-solid fa-map-location-dot" style="font-size: 40px"></i>
                <div>
                    123, Guwahati, <br />
                    PNB Road, India Assam
                </div>
            </div>
        </div>
        <div class="contact-form">
            <form action="{{ route('contact.submit') }}" method="post">
                <div class="form-inputs">
                    <div class="form-input">
                        <label for="">First Name</label>
                        <input type="text" />
                    </div>
                    <div class="form-input">
                        <label for="">Last Name</label>
                        <input type="text" />
                    </div>
                </div>
                <div class="form-inputs">
                    <div class="form-input">
                        <label for="">Email</label>
                        <input type="text" />
                    </div>
                    <div class="form-input">
                        <label for="">Phone</label>
                        <input type="text" />
                    </div>
                </div>
                <div class="textarea-box">
                    <textarea name="" id="" cols="30" rows="10" placeholder="Message"></textarea>
                </div>
                <button class="send-btn"><a href="#">Send Message</a></button>
            </form>
        </div>
    </div>
    <div class="accordion">
      <h1>Frequently Asked Questions</h1>
      <div class="accordion-item">
        <input type="checkbox" id="accordion1" />
        <label for="accordion1" class="accordion-item-title"
          ><span class="icon"></span>What is SEO, and why is it important for
          online businesses?</label
        >
        <div class="accordion-item-desc">
          SEO, or Search Engine Optimization, is the practice of optimizing a
          website to improve its visibility on search engines like Google. It
          involves various techniques to enhance a site's ranking in search
          results. SEO is crucial for online businesses as it helps drive
          organic traffic, increases visibility, and ultimately leads to
          higher conversions.
        </div>
      </div>

      <div class="accordion-item">
        <input type="checkbox" id="accordion2" />
        <label for="accordion2" class="accordion-item-title"
          ><span class="icon"></span>How long does it take to see results from
          SEO efforts?</label
        >
        <div class="accordion-item-desc">
          The timeline for seeing results from SEO can vary based on several
          factors, such as the competitiveness of keywords, the current state
          of the website, and the effectiveness of the SEO strategy.
          Generally, it may take several weeks to months before noticeable
          improvements occur. However, long-term commitment to SEO is
          essential for sustained success.
        </div>
      </div>

      <div class="accordion-item">
        <input type="checkbox" id="accordion3" />
        <label for="accordion3" class="accordion-item-title"
          ><span class="icon"></span>What are the key components of a
          successful SEO strategy?</label
        >
        <div class="accordion-item-desc">
          A successful SEO strategy involves various components, including
          keyword research, on-page optimization, quality content creation,
          link building, technical SEO, and user experience optimization.
          These elements work together to improve a website's relevance and
          authority in the eyes of search engines.
        </div>
      </div>

      <div class="accordion-item">
        <input type="checkbox" id="accordion4" />
        <label for="accordion4" class="accordion-item-title"
          ><span class="icon"></span>How does mobile optimization impact
          SEO?</label
        >
        <div class="accordion-item-desc">
          Mobile optimization is crucial for SEO because search engines
          prioritize mobile-friendly websites. With the increasing use of
          smartphones, search engines like Google consider mobile
          responsiveness as a ranking factor. Websites that provide a seamless
          experience on mobile devices are more likely to rank higher in
          search results.
        </div>
      </div>

      <div class="accordion-item">
        <input type="checkbox" id="accordion5" />
        <label for="accordion5" class="accordion-item-title"
          ><span class="icon"></span>What is the role of backlinks in SEO, and
          how can they be acquired?</label
        >
        <div class="accordion-item-desc">
          Backlinks, or inbound links from other websites to yours, play a
          significant role in SEO. They are considered a vote of confidence
          and can improve a site's authority. Quality over quantity is crucial
          when acquiring backlinks. Strategies for obtaining backlinks include
          creating high-quality content, guest posting, reaching out to
          industry influencers, and participating in community activities.
          It's important to focus on natural and ethical link-building
          practices.
        </div>
      </div>
    </div>
</div>
<!-- FAQ Section -->


{{-- New Code --}}





{{-- <div class="site-section bg-primary">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="text-white mb-4">Offices</h2>
            </div>
            <div class="col-lg-4">
                <div class="p-4 bg-white mb-3 rounded">
                    <span class="d-block text-black h6 text-uppercase">Guwahati</span>
                    <p class="mb-0">G.B Road, Nagaon, Assam, Pin: 567899, St. Mountain View </p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="p-4 bg-white mb-3 rounded">
                    <span class="d-block text-black h6 text-uppercase">London</span>
                    <p class="mb-0">203 Fake St. Mountain View, San Francisco, California, USA</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="p-4 bg-white mb-3 rounded">
                    <span class="d-block text-black h6 text-uppercase">Canada</span>
                    <p class="mb-0">203 Fake St. Mountain View, San Francisco, California, USA</p>
                </div>
            </div>
        </div>
    </div>

</div> --}}


{{-- </div> --}}
@endsection
@section('scripts')
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
{{-- <script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/aos.js"></script> --}}

<script src="js/main.js"></script>

<script>
    $(document).ready(function() {
        function alignModal() {
            var modalDialog = $(this).find(".modal-dialog");

            // Applying the top margin on modal to align it vertically center
            modalDialog.css("margin-top", Math.max(0, ($(window).height() - modalDialog.height()) / 2));
        }
        // Align modal when it is displayed
        $(".modal").on("shown.bs.modal", alignModal);

        // Align modal when user resize the window
        $(window).on("resize", function() {
            $(".modal:visible").each(alignModal);
        });
    });
</script>

@endsection
