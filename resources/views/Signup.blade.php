@component('mail::message')
    <p>
        Order Number : {{$order->order_id}}
    </p>
    <p>
        Hello {{$name}} {{$surname}},
    </p>
    <p>
        You have bought this book:
        {{$book->title}}
    </p>
    <p>
        The Genre is:
        {{$book->genre->name}}
    </p>
    <p>
        Price:
        {{$book->price}}
    </p>
    <p>
        Written by:
        {{$author->name}}
    </p>
    @component('mail::button', ['url' => 'www.time.mk'])
        Click here To Check the order.
    @endcomponent
@endcomponent
