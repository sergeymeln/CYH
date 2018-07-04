 <header>
            <div class="row">
                <div class="col-sm-3">
                    <img src="images/logo.png" class="brand" alt="Connect Your Home&reg;">
                </div>
                <div class="col-md-8 col-md-offset-1 col-sm-offset-0 col-sm-9 double-row">
                    <div class="row top-search">
                        <div class="col-md-12 col-sm-7 col-sm-offset-5 col-md-offset-0">
                            <label for="search" placeholder="Search Address, City or Zip">Find Local Home Services In Your Area</label>
                            <input class="input" type="form-control" name="search" id="search">
                            <button class="btn btn-green">Go!</button>
                        </div>
                    </div>
                    <!-- /row -->
                    <div class="row" cf>
                        <div class="col-md-9 col-md-offset-3 col-sm-7 col-sm-offset-5">
                            <div class="phone">
                                <span class="phone-label">Order By Phone:</span><a href="tel:8881234567" class="phone-number"> <?php the_field('phone_number', 'option'); ?></a>
                            </div>
                            <!-- /phone -->
                        </div>
                        <!-- col-md-5 col-md-offset-7 -->
                    </div>
                    <!-- /row -->
                </div>
            </div>
            <!-- /row -->
            <div class="row">
                <nav class="top-nav">
               <a href="#" class="nav-toggle" id="nav-toggle" aria-hidden="false">Menu</a>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="results.php">Find Local Services</a></li>
                        <li><a href="bundle.php">Bundles</a></li>
                        <li><a href="channel-list.php">Television</a></li>
                        <li><a href="all-brands.php">Internet</a></li>
                        <li><a href="one-brand.php">Phone</a></li>
                        <li><a href="terms.php">Home Security</a></li>
                        <li><a href="contact.php">Other Home Services</a></li>
                    </ul>
                </nav>
            </div>
        </header>