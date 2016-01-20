
{{ form ('register', 'id': 'registerForm', 'onbeforesubmit': 'return false') }}
<h2> Регистрация </h2>



            {{ form.label('name', ['class': 'control-label']) }}

            {{ form.render('name', ['class': 'form-control']) }}

            {{ form.message('name') }}


 {{ form.label('email', ['class': 'control-label']) }}

            {{ form.render('email', ['class': 'form-control']) }}

            {{ form.message('email') }}

   {{ form.label('number', ['class': 'control-label']) }}

              {{ form.render('number', ['class': 'form-control']) }}

              {{ form.message('number') }}

 {{ form.label('password', ['class': 'control-label']) }}

            {{ form.render('password', ['class': 'form-control']) }}

            {{ form.message('password') }}

 {{ form.label('confirmPassword', ['class': 'control-label']) }}

            {{ form.render('confirmPassword', ['class': 'form-control']) }}

            {{ form.message('confirmPassword') }}


            {{ form.render('Sign Up') }}



</form>

