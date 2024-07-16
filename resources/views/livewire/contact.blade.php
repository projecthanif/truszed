<div>
    <div
      class="hero page-inner overlay"
      style="background-image: url('images/hero_bg_1.jpg')"
    >
      <div class="container">
        <div class="row justify-content-center align-items-center">
          <div class="col-lg-9 text-center mt-5">
            <h1 class="heading" data-aos="fade-up">Contact Us</h1>

            <nav
              aria-label="breadcrumb"
              data-aos="fade-up"
              data-aos-delay="200"
            >
              <ol class="breadcrumb text-center justify-content-center">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li
                  class="breadcrumb-item active text-white-50"
                  aria-current="page"
                >
                  Contact
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>

    <div class="section">
      <div class="container">
        <div class="row">
          <div
            class="col-lg-4 mb-5 mb-lg-0"
            data-aos="fade-up"
            data-aos-delay="100"
          >
            <div class="contact-info">
              <div class="address mt-2">
                <i class="icon-room"></i>
                <h4 class="mb-2">Location:</h4>
                <p>
                  physical location will be here,<br />
                  here
                </p>
              </div>

              <div class="open-hours mt-4">
                <i class="icon-clock-o"></i>
                <h4 class="mb-2">Open Hours:</h4>
                <p>
                  monday-Friday:<br />
                  11:00 AM - 2300 PM
                  [subject to change depending on your working hours]
                </p>
              </div>

              <div class="email mt-4">
                <i class="icon-envelope"></i>
                <h4 class="mb-2">Email:</h4>
                <p>info@truszedproperties.com</p>
                <p>contact@truszedproperties.com</p>
                <p>support@truszedproperties.com</p>

              </div>

              <div class="phone mt-4">
                <i class="icon-phone"></i>
                <h4 class="mb-2">Call:</h4>
                <p>+(234)9061512740</p>
              </div>
            </div>
          </div>
          <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
            <form action="{{route('contact.request')}}" method="post">
                @csrf
                @method('post')
              <div class="row">
                <div class="col-6 mb-3">
                  <input
                    type="text"
                    name="name"
                    class="form-control"
                    placeholder="Your Name"
                  />
                </div>
                <div class="col-6 mb-3">
                  <input
                    type="email"
                    name="email"
                    class="form-control"
                    placeholder="Your Email"
                  />
                </div>
                <div class="col-12 mb-3">
                  <input
                    type="text"
                    name="subject"
                    class="form-control"
                    placeholder="Subject"
                  />
                </div>
                <div class="col-12 mb-3">
                  <textarea
                    id=""
                    cols="30"
                    rows="7"
                    name="message"
                    class="form-control"
                    placeholder="Message"
                  ></textarea>
                </div>

                <div class="col-12">
                  <input
                    type="submit"
                    value="Send Message"
                    class="btn btn-primary"
                  />
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- /.untree_co-section -->
</div>
