<?php $this->load->view('layout/header');?>

<!-- main content -->

<div id="main" data-scroll-container>

        <div id="page1">
            </div>
            <br>
            <br>
            <br>
            <br><br><br><br><br>
            <div id="center">
                <div id="left">
                    <h3><img src="https://static.uacdn.net/production/_next/static/images/home-illustration.svg?q=75&auto=format%2Ccompress&w=1200" alt="">.</h3>
                </div>
                <div id="right">
                    <h1>SMART <br>
                        STUDENT <br>
                        HELPER</h1>
                </div>

            </div>
            <!-- <div id="hero-shape">
                <div id="hero-1"></div>
                <div id="hero-2"></div>
                <div id="hero-3"></div>
            </div> -->
            <br><br><br><br><br><br><br><br><br>
            
        </div>

        <div id="page2">
        <div id="ct">
                <div class="ct" onclick="window.location.href='<?= base_url('todol') ?>'">
                    <img src="https://www.shutterstock.com/image-vector/do-list-lettering-vector-pencil-600nw-1837137628.jpg" alt="">
                </div>

                <div class="ct" onclick="window.location.href='<?= base_url('bm') ?>'"><img src="https://www.shutterstock.com/image-vector/kcal-icon-calories-sign-combination-600nw-1583239552.jpg" alt=""></div>
                <div class="ct" onclick="window.location.href='<?= base_url('bmt') ?>'"><img src="https://media.istockphoto.com/id/822667290/vector/money-savings-investment-plan-stock-market-finance-services-line-icon.jpg?s=612x612&w=0&k=20&c=ANtgj06oW5f7ovVOqrPPm2_U06howNkhjN4cVY-vhkc=" alt=""></div>
                
                <div class="ct" onclick="window.location.href='<?= base_url('mg') ?>'"><img src="https://img.freepik.com/premium-vector/brain-game-logo-design-template_145155-3577.jpg?semt=ais_hybrid" alt=""></div>
                <h3 class="ct" onclick="window.location.href='<?= base_url('reminder') ?>'"><img src="https://media.istockphoto.com/id/1472866345/vector/3d-vector-online-shop-reminder-notification-rectangle-label-badge-with-yellow-bell-new-icon.jpg?s=612x612&w=0&k=20&c=kLIbu5aUMU69HJPe476X7u2hiopDN2TipYJCG9ev7WQ=" alt=""></h3>
                <h3 class="ct" onclick="window.location.href='<?= base_url('dash') ?>'"><img src="https://adniasolutions.com/wp-content/uploads/2018/03/Incident-Dashboard-Template-2.png" alt=""></h3>
        </div>
                <br>
                <!-- <h3 class="ct">Coming soon</h3>
                <h3 class="ct">Coming soon</h3>
                <h3 class="ct">Coming soon</h3> -->
            </div>
        </div>

        <div id="page3">

        </div>
        <div id="full-scr">
            <div id="full-div1">
                
            </div>
        </div>

        <div id="footer">
        <canvas id="footerCanvas"></canvas>
        <div id="footer-content">
            <h1>SMART STUDENT HELPER</h1>
            <p>&copy; 2025 Sundown Studio. All Rights Reserved.</p>
            <div id="footer-links">
                <a href="#">Privacy Policy</a>
                <a href="#">Terms of Service</a>
                <a href="#">Contact Us</a>
            </div>
        </div>
    </div>


    </div>

    

<script>
    const canvas = document.getElementById("footerCanvas");
        const ctx = canvas.getContext("2d");
        canvas.width = window.innerWidth;
        canvas.height = 300;

        let particles = [];

        class Particle {
            constructor() {
                this.x = Math.random() * canvas.width;
                this.y = Math.random() * canvas.height;
                this.size = Math.random() * 5 + 1;
                this.speedX = (Math.random() - 0.5) * 2;
                this.speedY = (Math.random() - 0.5) * 2;
            }
            update() {
                this.x += this.speedX;
                this.y += this.speedY;
                if (this.x < 0 || this.x > canvas.width) this.speedX *= -1;
                if (this.y < 0 || this.y > canvas.height) this.speedY *= -1;
            }
            draw() {
                ctx.fillStyle = "rgba(0, 0, 0, 0.8)";
                ctx.beginPath();
                ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
                ctx.fill();
            }
        }

        function init() {
            particles = [];
            for (let i = 100; i--;) {
                particles.push(new Particle());
            }
        }

        function animate() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            particles.forEach(p => {
                p.update();
                p.draw();
            });
            requestAnimationFrame(animate);
        }

        init();
        animate();

        window.addEventListener("resize", () => {
            canvas.width = window.innerWidth;
            canvas.height = 300;
            init();
        });

</script>

<?php $this->load->view('layout/footer');?>
       

