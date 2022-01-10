<style>
    .txt-center {
        text-align: center;
    }
    .hide {
        display: none;
    }

    .clear {
        float: none;
        clear: both;
    }

    .rating {
        width: 100%;
        unicode-bidi: bidi-override;
        direction: rtl;
        text-align: center;
        position: relative;
    }

    .rating > label {
        float: right;
        display: inline;
        padding: 0;
        margin: 0;
        position: relative;
        width: 1.1em;
        cursor: pointer;
        font-size: 3rem;
        color: rgb(156 163 175);
    }

    .rating > label:hover,
    .rating > label:hover ~ label,
    .rating > input.radio-btn:checked ~ label {
        color: transparent;
    }

    .rating > label:hover:before,
    .rating > label:hover ~ label:before,
    .rating > input.radio-btn:checked ~ label:before,
    .rating > input.radio-btn:checked ~ label:before {
        content: "\2605";
        position: absolute;
        left: 0;
        color: #4B5563;
    }

</style>
<div class="rating txt-center flex justify-center">
    <input id="star5" name="star" type="radio" value="5" class="radio-btn hide" />
    <label for="star5" >☆</label>
    <input id="star4" name="star" type="radio" value="4" class="radio-btn hide" />
    <label for="star4" >☆</label>
    <input id="star3" name="star" type="radio" value="3" class="radio-btn hide" />
    <label for="star3" >☆</label>
    <input id="star2" name="star" type="radio" value="2" class="radio-btn hide" />
    <label for="star2" >☆</label>
    <input id="star1" name="star" type="radio" value="1" class="radio-btn hide" />
    <label for="star1" >☆</label>
    <div class="clear"></div>
</div>
