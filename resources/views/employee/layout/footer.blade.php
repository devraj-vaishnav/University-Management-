<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <script>document.write(new Date().getFullYear())</script>

            </div>
            <div class="col-sm-6">
                <div class="text-sm-right d-none d-sm-block">
                    Crafted with by <a
                        target="_blank">Object Developer</a>
                </div>
            </div>
        </div>
    </div>
</footer>
</div>
</div>

<!-- END layout-wrapper -->


<!-- Right bar overlay-->

<!-- JAVASCRIPT -->
<script src="{{asset('theme/assets/libs/jquery/jquery.min.js')}}"></script>
<script src="{{asset('theme/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('theme/assets/libs/metismenu/metisMenu.min.js')}}"></script>
<script src="{{asset('theme/assets/libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{asset('theme/assets/libs/node-waves/waves.min.js')}}"></script>
<script src="{{asset('theme/assets/libs/toastr/build/toastr.min.js')}}"></script>

<!-- toastr init -->
<script src="{{asset('theme/assets/js/pages/toastr.init.js')}}"></script>
<script src="{{asset('theme/assets/js/app.js')}}"></script>
@stack('footer_script')
@include('employee.layout.message')

</body>

</html>
