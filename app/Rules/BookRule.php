<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class BookRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */

    private $_shop_id,
        $_book_date,
        $_end_at;
    public function __construct($shop_id, $book_date, $book_time, $number)
    {
        $this->_shop_id = $shop_id;
        $this->_book_date = $book_date;
        $this->_book_time = $book_time;
        $this->_number = $number;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return \App\Models\Book::where('shop_id', $this->_shop_id)
            ->whereHasReservation($this->_book_date, $this->_book_time, $this->_number)
            ->doesntExist();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return '他の予約が入っています。';
    }
}
