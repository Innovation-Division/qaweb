<div class="itp itp-title">
      <div class="group-108462">
        <img class="hackguard-banner"  style="width: 100%;" src="{{ URL::to('/') }}/asset/ecommerce/hackguard/banner.png" alt="COCOGEN"  />
        <div class="frame-108576">
          <div class="frame-1085762">
            <div class="get-a-quote">Get a Quote</div>
            <img class="icon-caret-down2"  src="{{ asset('/asset\ecommerce\hackguard\icon-caret-down1.svg') }}"/>
            <div class="hackguard">Hackguard</div>
          </div>
          <div class="hackguard2">Hackguard 
          </div>
        </div>
      </div>
    </div>


    @if (Agent::isMobile()) 
    <style>
      .group-108428{
        width: 100%;
        
      }
      .hackguard2{
        top: -62px !important;
      }
      .get-a-quote {
        text-align: right;
        font-size: 12px !important;
      }
      .hackguard-banner{
        height:50px;
      }

      .hackguard {
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
    position: absolute;
    top: 20%; 
    left: 50%;
    transform: translateX(-50%);
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 0;
    color: white;
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
    .hackguard {
      color: #ffffff;
      text-align: center;
      font-family: var(--web-medium-tiny-font-family, "Inter-Medium", sans-serif);
      font-size: 17px;
      line-height: 24px;
      font-weight: 500;
      position: relative;
      position: relative;
    }
    .hackguard2 {
      color: #ffffff;
      text-align: center;
      font-size: 40px !important;
      font-family: var(--web-medium-tiny-font-family, "Inter-Medium", sans-serif);
      font-weight: 500  ;
      position: relative;
    }

@media (max-width: 768px) {
  .frame-108576 {
    top: 5% !important; 
    position: absolute;
  }

  .frame-1085762 {
    top: 0 !important;
    padding-top: 0 !important;
  }
  .get-a-quote,
  .hackguard,
  .hackguard2 {
    font-size: 10px !important;
    margin: 0 !important;
    padding: 0 !important;
    line-height: 1.2;
  }

  .hackguard2 {
    margin-top: -4px !important; 
  }
}



</style>    
