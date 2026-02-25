<?php
include "header.php";
?>

    <section id="slider" class="container-fluid">
      <div
        class="d-flex flex-wrap justify-content-center gap-5 mt-4 custom-card-wrapper"
      >
        <div class="card custom-card">
          <img src="images/c_wish.jpg" class="card-img-top" alt="..." />
          <div class="card-body">
            <p class="card-text">
              Embarked on her first world tour ″Wish″ with two sold-out shows at
              Japan National Stadium, becoming the first female soloist to do
              so.
            </p>
          </div>
        </div>

        <div class="card custom-card">
          <img src="images/c_hibana.jpg" class="card-img-top" alt="..." />
          <div class="card-body">
            <p class="card-text">
              Announced second global trek, Hibana Tour 2025, covering 30+
              cities across Asia, Europe, North America, Latin America, and
              Australia, organized by Crunchyroll.
            </p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col px-0">
          <div
            id="carouselExampleCaptions"
            class="carousel slide"
            data-bs-ride="false"
          >
            <div class="carousel-indicators">
              <button
                type="button"
                data-bs-target="#carouselExampleCaptions"
                data-bs-slide-to="0"
                class="active"
                aria-current="true"
                aria-label="Slide 1"
              ></button>
              <button
                type="button"
                data-bs-target="#carouselExampleCaptions"
                data-bs-slide-to="1"
                aria-label="Slide 2"
              ></button>
              <button
                type="button"
                data-bs-target="#carouselExampleCaptions"
                data-bs-slide-to="2"
                aria-label="Slide 3"
              ></button>
              <button
                type="button"
                data-bs-target="#carouselExampleCaptions"
                data-bs-slide-to="3"
                aria-label="Slide 4"
              ></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="images/wish1.jpg" class="d-block w-100" alt="..." />
                <div class="carousel-caption d-none d-md-block">
                  <h5>Wish Tour</h5>
                  <p>Los Angeles, March 29th 2024</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="images/wish2.jpg" class="d-block w-100" alt="..." />
                <div class="carousel-caption d-none d-md-block">
                  <h5>Wish Tour</h5>
                  <p>Kuala Lumpur, February 21th 2024</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="images/hibana2.jpg" class="d-block w-100" alt="..." />
                <div class="carousel-caption d-none d-md-block">
                  <h5>Hibana Tour</h5>
                  <p>Melbourne, May 27th 2025</p>
                </div>
              </div>

              <div class="carousel-item">
                <img src="images/hibana1.jpg" class="d-block w-100" alt="..." />
                <div class="carousel-caption d-none d-md-block">
                  <h5>Hibana Tour</h5>
                  <p>Melbourne, May 27th 2025</p>
                </div>
              </div>
            </div>
            <button
              class="carousel-control-prev"
              type="button"
              data-bs-target="#carouselExampleCaptions"
              data-bs-slide="prev"
            >
              <span
                class="carousel-control-prev-icon"
                aria-hidden="true"
              ></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button
              class="carousel-control-next"
              type="button"
              data-bs-target="#carouselExampleCaptions"
              data-bs-slide="next"
            >
              <span
                class="carousel-control-next-icon"
                aria-hidden="true"
              ></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
      </div>
    </section>


<?php
include "footer.php"
?>
