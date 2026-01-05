<div class="col-md-12"> <br></div>
<div class="col-md-12"> <br></div>
<div class="col-md-12"> <br></div>

<div class="form-group">
    <div class="col-md-12">
      <div class="sht">
        <div class="frame-108455">
          <div class="frame-108456">
            <div class="section-header-title">Travel Details</div>
            <img class="vector_step1" src="{{ asset('/asset/ecommerce/itp/vector0.svg') }}"/>
          </div>
        </div>
      </div>
    </div> 
    <div class="col-md-12">
      <div class="default_trip_type">
            <div class="frame-108503">
                <div class="field-label-section">Choose one type of destination</div>
            </div>
            <div class="frame-108504">
                <div class="frame-108502">
                  <div id="single-destination" class="a option_tab" data-id="single">
                        <div id="single-destination_text" class="selection-title">Single Destination</div>
                  </div>
                  <div  id="multiple-destination" class="b option_tab" data-id="multiple">
                      <div id="multiple-destination_text" class="selection-title">Multi-Destinations</div>
                  </div>
                </div>
            </div>

      </div>
    </div>
    <div class="col-md-12">
        <div class="green-tooltip">
              <div class="frame-108510">
                  <div class="frame-108503">
                      <div class="field-label-section">
                          Are you travelling via air or non-air?
                      </div>
                  </div>
              </div>
              <div class="frame-108504">
                  <div class="frame-108502">
                      <div id="air-destination"  class="a option_tab" data-id="air">
                          <div id="air-destination_text" class="selection-title"> &nbsp;&nbsp;&nbsp;Air&nbsp;&nbsp;&nbsp;</div>
                      </div>
                      <div id="non-air-destination" class="b option_tab" data-id="non-air">
                          <div id="non-air-destination_text" class="selection-title">Non-Air</div>
                      </div>
                  </div>
              </div>
              <div class="frame-108773">
                  <div class="frame-108772">
                        <img class="icon-airplane" src="{{ asset('/asset/ecommerce/img/icon-airplane0.svg') }}" />
                        <div class="air-travel-via-plane">AIR: Travel via plane</div>
                  </div>
                  <div class="frame-108771">
                        <img class="icon-airplane" src="{{ asset('/asset/ecommerce/img/icon-compass0.svg') }}" />
                        <div class="non-air-travel-via-land-or-sea-minimum-of-125-km-away-from-usual-place-of-residence-verify-distance-via-google-maps" >
                          NON-AIR: Travel via land or sea. Minimum of 125 km. away from usual
                          place of residence. Verify distance via Google Maps
                        </div>
                    </div>
              </div>
        </div>
    </div>
</div>
<style>
    .option_tab{
      cursor:pointer;
    }
    .default_trip_type,
    .default_trip_type * {
    box-sizing: border-box;
    }
    .default_trip_type {
    background: var(--teal-lvl-0, #f7ffff);
    /* padding: 70px 0px 50px 0px; */
    /* display: flex; */
    flex-direction: column;
    gap: 0px;
    align-items: flex-start;
    justify-content: flex-start;
    position: relative;
    }
    .frame-108503 {
    padding: 20px 250px 20px 250px;
    display: flex;
    flex-direction: row;
    gap: 10px;
    align-items: center;
    justify-content: center;
    align-self: stretch;
    flex-shrink: 0;
    position: relative;
    }
    .field-label-section {
    color: var(--primary-black, #2d2727);
    text-align: left;
    font-family: var(
        --web-medium-header-5-font-family,
        "Inter-Medium",
        sans-serif
    );
    font-size: var(--web-medium-header-5-font-size, 23px);
    font-weight: var(--web-medium-header-5-font-weight, 500);
    position: relative;
    }
    .frame-108504 {
    display: flex;
    flex-direction: column;
    gap: 0px;
    align-items: flex-start;
    justify-content: flex-start;
    align-self: stretch;
    flex-shrink: 0;
    position: relative;
    }
    .frame-108502 {
    padding: 15px 250px 15px 250px;
    display: flex;
    flex-direction: row;
    gap: 50px;
    align-items: center;
    justify-content: center;
    align-self: stretch;
    flex-shrink: 0;
    position: relative;
    }
    .a {
    border-radius: 50px;
    border-style: solid;
    border-color: var(--primary-pink, #edcadc);
    border-width: 1px;
    padding: 25px 35px 25px 35px;
    display: flex;
    flex-direction: row;
    gap: 10px;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    position: relative;
    }
    .selection-title {
    color: var(--primary-pink, #e4509a);
    text-align: left;
    font-family: var(--web-medium-body-font-family, "Inter-Medium", sans-serif);
    font-size: var(--web-medium-body-font-size, 16px);
    line-height: var(--web-medium-body-line-height, 24px);
    font-weight: var(--web-medium-body-font-weight, 500);
    position: relative;
    }
    .b {
    border-radius: 50px;
    border-style: solid;
    border-color: var(--primary-pink, #edcadc);
    border-width: 1px;
    padding: 25px 35px 25px 35px;
    display: flex;
    flex-direction: row;
    gap: 10px;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    position: relative;
    }


</style>

<style>
    .green-tooltip,
    .green-tooltip * {
      box-sizing: border-box;
    }
    .green-tooltip {
      background: var(--surfaces-lvl-0, #f7fcff);
      padding: 50px 0px 50px 0px;
      display: flex;
      flex-direction: column;
      gap: 0px;
      align-items: flex-start;
      justify-content: flex-start;
      position: relative;
    }
    .frame-108510 {
      display: flex;
      flex-direction: column;
      gap: 0px;
      align-items: flex-start;
      justify-content: flex-start;
      align-self: stretch;
      flex-shrink: 0;
      position: relative;
    }
    .frame-108503 {
      padding: 20px 250px 20px 250px;
      display: flex;
      flex-direction: row;
      gap: 10px;
      align-items: center;
      justify-content: center;
      align-self: stretch;
      flex-shrink: 0;
      position: relative;
    }
    .field-label-section {
      color: var(--primary-black, #2d2727);
      text-align: left;
      font-family: var(
        --web-medium-header-5-font-family,
        "Inter-Medium",
        sans-serif
      );
      font-size: var(--web-medium-header-5-font-size, 23px);
      font-weight: var(--web-medium-header-5-font-weight, 500);
      position: relative;
    }
    .frame-108509 {
      padding: 0px 0px 10px 0px;
      display: flex;
      flex-direction: column;
      gap: 0px;
      align-items: flex-start;
      justify-content: flex-start;
      align-self: stretch;
      flex-shrink: 0;
      position: relative;
    }
    .frame-108508 {
      padding: 15px 250px 15px 415px;
      display: flex;
      flex-direction: row;
      gap: 50px;
      align-items: center;
      justify-content: flex-start;
      align-self: stretch;
      flex-shrink: 0;
      position: relative;
    }

    .air {
      color: var(--primary-white, #ffffff);
      text-align: left;
      font-family: var(--web-medium-body-font-family, "Inter-Medium", sans-serif);
      font-size: var(--web-medium-body-font-size, 16px);
      line-height: var(--web-medium-body-line-height, 24px);
      font-weight: var(--web-medium-body-font-weight, 500);
      position: relative;
    }
    .b {
      border-radius: 50px;
      border-style: solid;
      border-color: var(--primary-pink-disabled, #edcadc);
      border-width: 1px;
      padding: 25px 35px 25px 35px;
      display: flex;
      flex-direction: row;
      gap: 10px;
      align-items: center;
      justify-content: center;
      flex-shrink: 0;
      position: relative;
    }
    .non-air {
      color: var(--primary-pink-disabled, #edcadc);
      text-align: center;
      font-family: var(--web-medium-body-font-family, "Inter-Medium", sans-serif);
      font-size: var(--web-medium-body-font-size, 16px);
      line-height: var(--web-medium-body-line-height, 24px);
      font-weight: var(--web-medium-body-font-weight, 500);
      position: relative;
      width: 80px;
    }
    .frame-108773 {
      display: flex;
      flex-direction: column;
      gap: 10px;
      align-items: center;
      justify-content: center;
      align-self: stretch;
      flex-shrink: 0;
      position: relative;
    }
    .frame-108772 {
      display: flex;
      flex-direction: row;
      gap: 12px;
      align-items: center;
      justify-content: flex-start;
      flex-shrink: 0;
      position: relative;
    }
    .icon-airplane {
      flex-shrink: 0;
      width: 16px;
      height: 16px;
      position: relative;
      overflow: visible;
    }
    .air-travel-via-plane {
      color: var(--surfaces-lvl-5, #848a90);
      text-align: left;
      font-family: var(--web-medium-tiny-font-family, "Inter-Medium", sans-serif);
      font-size: var(--web-medium-tiny-font-size, 12px);
      line-height: var(--web-medium-tiny-line-height, 20px);
      font-weight: var(--web-medium-tiny-font-weight, 500);
      position: relative;
    }
    .frame-108771 {
      display: flex;
      flex-direction: row;
      gap: 12px;
      align-items: center;
      justify-content: flex-start;
      flex-shrink: 0;
      position: relative;
    }
    .icon-compass {
      flex-shrink: 0;
      width: 16px;
      height: 16px;
      position: relative;
      overflow: visible;
    }
    .non-air-travel-via-land-or-sea-minimum-of-125-km-away-from-usual-place-of-residence-verify-distance-via-google-maps {
      color: var(--surfaces-lvl-5, #848a90);
      text-align: left;
      font-family: var(--web-medium-tiny-font-family, "Inter-Medium", sans-serif);
      font-size: var(--web-medium-tiny-font-size, 12px);
      line-height: var(--web-medium-tiny-line-height, 20px);
      font-weight: var(--web-medium-tiny-font-weight, 500);
      position: relative;
      width: 698px;
    }

</style>