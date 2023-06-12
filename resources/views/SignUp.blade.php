@component('mail::message')
    <p>Hello!</p>
    <h3>{{$user_name}}</h3>
   <p>You Ordered the book</p>
    <h4>{{ htmlspecialchars($book->title)}}</h4>
    <p>With the author</p>
    <h4>{{$author->name}}</h4>
    <p>Thanks for the order {{$user_surname}}</p>
    @component('mail::button',['url' => 'https://example.com'])
        <p>Click Here</p>
    @endcomponent

    @endcomponent
