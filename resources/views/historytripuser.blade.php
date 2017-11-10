@extends('layouts.headprofile') @section('title', 'History Trip') @section('history')
<link href="{{asset('css/profile/blogttc.css')}}" rel="stylesheet" type="text/css" />
<style>
  body {

    color: #4f585e;
    font-family: 'Prompt', sans-serif;
    text-rendering: optimizeLegibility;
  }

  a.btn2 {
    background: #0096a0;
    border-radius: 4px;
    box-shadow: 0 2px 0px 0 rgba(0, 0, 0, 0.25);
    color: #ffffff;
    display: inline-block;
    padding: 6px 30px 8px;
    position: relative;
    text-decoration: none;
    transition: all 0.1s 0s ease-out;
  }

  .no-touch a.btn2:hover {
    background: lighten(#0096a0, 2.5);
    box-shadow: 0px 8px 2px 0 rgba(0, 0, 0, 0.075);
    transform: translateY(-2px);
    transition: all 0.25s 0s ease-out;
  }

  .no-touch a.btn2:active,
  a.btn2:active {
    background: darken(#0096a0, 2.5);
    box-shadow: 0 1px 0px 0 rgba(255, 255, 255, 0.25);
    transform: translate3d(0, 1px, 0);
    transition: all 0.025s 0s ease-out;
  }

  div.cards2 {
    margin: 80px auto;
    max-width: 960px;
    text-align: center;
  }

  div.card2 {
    background: #ffffff;
    display: inline-block;
    margin: 8px;
    max-width: 300px;
    perspective: 1000;
    position: relative;
    text-align: left;
    transition: all 0.3s 0s ease-in;
    z-index: 1;

    img {
      max-width: 300px;
    }

    div.card-title2 {
      background: #ffffff;
      padding: 6px 15px 10px;
      position: relative;
      z-index: 0;

      a.toggle-info2 {
        border-radius: 32px;
        height: 32px;
        padding: 0;
        position: absolute;
        right: 15px;
        top: 10px;
        width: 32px;

        span {
          background: #ffffff;
          display: block;
          height: 2px;
          position: absolute;
          top: 16px;
          transition: all 0.15s 0s ease-out;
          width: 12px;
        }

        span.left2 {
          right: 14px;
          transform: rotate(45deg);
        }
        span.right2 {
          left: 14px;
          transform: rotate(-45deg);
        }
      }

      h2 {
        font-size: 24px;
        font-weight: 700;
        letter-spacing: -0.05em;
        margin: 0;
        padding: 0;

        small {
          display: block;
          font-size: 18px;
          font-weight: 600;
          letter-spacing: -0.025em;
        }
      }
    }

    div.card-description2 {
      padding: 0 15px 10px;
      position: relative;
      font-size: 14px;
    }

    div.card-actions2 {
      box-shadow: 0 2px 0px 0 rgba(0, 0, 0, 0.075);
      padding: 10px 15px 20px;
      text-align: center;
    }

    div.card-flap2 {
      background: darken(@white, 15);
      position: absolute;
      width: 100%;
      transform-origin: top;
      transform: rotateX(-90deg);
    }
    div.flap1 {
      transition: all 0.3s 0.3s ease-out;
      z-index: -1;
    }
    div.flap2 {
      transition: all 0.3s 0s ease-out;
      z-index: -2;
    }
  }

  div.cards2.showing2 {
    div.card2 {
      cursor: pointer;
      opacity: 0.6;
      transform: scale(0.88);
    }
  }

  .no-touch div.cards2.showing2 {
    div.card2:hover {
      opacity: 0.94;
      transform: scale(0.92);
    }
  }

  div.card2.show2 {
    opacity: 1 !important;
    transform: scale(1) !important;

    div.card-title2 {
      a.toggle-info2 {
        background: #ff6666 !important;
        span {
          top: 15px;
        }
        span.left2 {
          right: 10px;
        }
        span.right2 {
          left: 10px;
        }
      }
    }
    div.card-flap2 {
      background: #ffffff;
      transform: rotateX(0deg);
    }
    div.flap1 {
      transition: all 0.3s 0s ease-out;
    }
    div.flap2 {
      transition: all 0.3s 0.2s ease-out;
    }
  }
</style>
<div class="container">
  <div class="cards2">

    <div class="card2">
      <img src="http://s4c.cymru/temp/wave1.jpg">
      <div class="card-title2">
        <a href="#" class="toggle-info2 btn2">
          <span class="left2"></span>
          <span class="right2"></span>
        </a>
        <h2>
          Card title
          <small>Image from unsplash.com</small>
        </h2>
      </div>
      <div class="card-flap2 flap1">
        <div class="card-description2">
          This grid is an attempt to make something nice that works on touch devices. Ignoring hover states when they're not available
          etc.
        </div>
        <div class="card-flap2 flap2">
          <div class="card-actions2">
            <a href="#" class="btn2">Read more</a>
          </div>
        </div>
      </div>
    </div>
  </div>





</div>
<script>
  $(document).ready(function () {
    var zindex = 10;

    $("div.card2").click(function (e) {
      e.preventDefault();

      var isShowing = false;

      if ($(this).hasClass("show2")) {
        isShowing = true
      }

      if ($("div.cards2").hasClass("showing2")) {
        // a card is already in view
        $("div.card2.show2")
          .removeClass("show2");

        if (isShowing) {
          // this card was showing - reset the grid
          $("div.cards2")
            .removeClass("showing2");
        } else {
          // this card isn't showing - get in with it
          $(this)
            .css({
              zIndex: zindex
            })
            .addClass("show2");

        }

        zindex++;

      } else {
        // no cards in view
        $("div.cards2")
          .addClass("showing2");
        $(this)
          .css({
            zIndex: zindex
          })
          .addClass("show2");

        zindex++;
      }

    });
  });
</script>

@endsection