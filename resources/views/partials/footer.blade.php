<!-- Footer -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <ul class="list-inline text-center">
                    @social
                    @slot('link')
                    <a href="http://twitter.com/treinaweb">
                        @endslot
                        <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                        @endsocial
                    </a>
                    @social
                    @slot('link')
                    <a href="http://facebook.com/treinaweb">
                        @endslot
                        <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                        @endsocial
                    </a>

                    @social
                    @slot('link')
                    <a href="http://github.com/treinaweb">
                        @endslot
                        <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                        @endsocial
                    </a>
                </ul>
                <p class="copyright text-muted">Copyright &copy; Your Website 2019</p>
            </div>
        </div>
    </div>
</footer>

<!-- Bootstrap core JavaScript -->
<script src="/js/jquery/jquery.min.js"></script>
<script src="/js/bootstrap/js/bootstrap.bundle.min.js"></script>

@stack('scripts')

<!-- Custom scripts for this template -->
<script src="/js/clean-blog.min.js"></script>
</div>