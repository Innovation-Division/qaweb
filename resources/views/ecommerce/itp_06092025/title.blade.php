<div class="itp itp-title">
      <div class="group-108462">
        <img class="world-traveler-tag-with-passport-map-compass-tickets-toy-airplane-and-earphone-on-white-and-pink-background"  style="width: 100%;" src="{{ URL::to('/') }}/asset/ecommerce/itp/step1/banner.png" alt="COCOGEN"  />
        <div class="frame-108576">
          <div class="frame-1085762">
            <div class="get-a-quote">Get a Quote</div>
            <img class="icon-caret-down2"  src="{{ asset('/asset\ecommerce\itp\step1\icon-caret-down1.svg') }}"/>
            <div class="international-travel-plus">International Travel Plus</div>
          </div>
          <div class="international-travel-plus2">International Travel Plus 
          </div>
        </div>
      </div>
    </div>


    @if (Agent::isMobile()) 
    <style>
      .group-108428{
        width: 100%;
        
      }
      .international-travel-plus2{
        font-size: 14px !important;
        top: -62px !important;
      }
      .get-a-quote {
        text-align: right;
        font-size: 12px !important;
      }
      .world-traveler-tag-with-passport-map-compass-tickets-toy-airplane-and-earphone-on-white-and-pink-background{
        height:50px;
      }

      .international-travel-plus {
          font-size: 12px !important;
      }
      .frame-108576,
      .frame-1085762{
        gap:0px !important;
        left:0px !important;
        width: 100% !important;
      }

      .frame-1085762 {
        top: -44px !important;
        width: 100% !important;
        padding-left: 18% !important;
      }
    </style>
    @endif
    <style>
  .frame-108576,
    .frame-108576 * {
      box-sizing: border-box;
    }

    .frame-108576 {
      display: flex;
      flex-direction: column;
      gap: 0px;
      align-items: center;
      justify-content: flex-start;
      position: absolute;
      left: 38%;
      top: 23%;
      line-height: 20px;
    }
    .frame-1085762 {
      padding: 10px 0px 10px 0px;
      display: flex;
      flex-direction: row;
      gap: 14px;
      align-items: center;
      justify-content: flex-start;
      flex-shrink: 0;
      position: relative;
    }
    .get-a-quote {
      color: var(--surfaces-lvl-3, #ffffff);
      text-align: center;
      font-family: var(--web-medium-tiny-font-family, "Inter-Medium", sans-serif);
      font-size: var(--web-medium-caption-font-size, 17px);
      line-height: var(--web-medium-caption-line-height, 24px);
      font-weight: var(--web-medium-caption-font-weight, 500);
      position: relative;
    }
    .icon-caret-down {
      flex-shrink: 0;
      width: 15px;
      height: 15px;
      position: relative;
      overflow: visible;
    }
    .international-travel-plus {
      color: #ffffff;
      text-align: center;
      font-family:  "Inter-Medium", sans-serif;
      font-size: 17px;
      line-height: 24px;
      font-weight: 500;
      position: relative;
      position: relative;
    }
    .international-travel-plus2 {
      color: #ffffff;
      text-align: center;
      font-size: 40px ;
      font-weight: 500  ;
      position: relative;
    }

</style>    