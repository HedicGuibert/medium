import { Link } from "react-router-dom";
function App() {
    return (
        <div>
            <h1>Page d'Accueil</h1>
            <Link to="/profile">Profil</Link>

            <section class="p-0 pt-10 bg-primary text-white">
                <div class="container">
                    <div class="row align-items-center justify-content-between py-5 py-md-10">
                    <div class="col-12 col-lg-6 text-center text-lg-left">
                        <h1 class="display-3">Speed up your workflow with our <b>features.</b></h1>
                        <div class="input-group mb-1">
                        <input type="text" class="form-control px-3" placeholder="your@mail.com" aria-label="Get a free copy"/>
                        <div class="input-group-append">
                            <button class="btn btn-white" type="button">Subscribe</button>
                        </div>
                        </div>
                        <small>* we won't share your data with third parties</small>
                    </div>
                    <div class="col-12 col-lg-6 aos-init aos-animate" data-aos="zoom-in" data-aos-delay="500">
                        <img src="../images/demo/app/app-1.svg" alt="Image"/>
                    </div>
                    </div>
                </div>
                </section>

        </div>
    );
  }

  export default App;
