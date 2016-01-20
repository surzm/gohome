
{{ content() }}


{{ form ('session/start', 'id': 'SessionForm', 'onbeforesubmit': 'return false') }}
<h2> Авторизация </h2>




            {{ form.render('email', ['class': 'form-control']) }}

            {{ form.message('email') }}



            {{ form.render('password', ['class': 'form-control']) }}

            {{ form.message('password') }}


            {{ form.render('go') }}



</form>





    <div class="col-md-6">

        <div class="page-header">
            <h2>Don't have an account yet?</h2>
        </div>
        <p>Create an account offers the following advantages:</p>
        <ul>
            <li>Create, track and export your invoices online</li>
            <li>Gain critical insights into how your business is doing</li>
            <li>Stay informed about promotions and special packages</li>
        </ul>
        <div class="clearfix center">
            {{ link_to('register', 'Sign Up', 'class': 'btn btn-primary btn-large btn-success') }}
        </div>
    </div>
</div>