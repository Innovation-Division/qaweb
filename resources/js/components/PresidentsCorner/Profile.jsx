import { useEffect } from "react";
import pres from "../../assets/images/pres.png";

const Profile = () => {
    useEffect(() => {
        window.scrollTo(0, 0);
    }, []);
    return (
        <div className="flex px-10 md:px-20 lg:px-20 xl:px-28 2xl:px-52 md:mt-10 mb-32 gap-5">
            <div className="hidden lg:flex md:basis-1/4 justify-center items-start w-full">
                <img src={pres} alt="" className="w-[250px] hidden md:block" />
            </div>
            <div className="flex flex-col space-y-4 lg:basis-3/4">
                <p className="font-bold text-3xl text-[#2D2727] hidden lg:block">
                    David Roy Padin
                </p>
                <p className="text-[#585858] font-medium leading-6 hidden lg:block">
                    President & CEO of Cocogen Insurance Inc.,
                </p>
                <div className="flex lg:hidden gap-8 self-center justify-center items-center w-full">
                    <div>
                        <img
                            src={pres}
                            alt=""
                            className="w-[100px] rounded-full scale-x-[-1]"
                        />
                    </div>
                    <div className="flex flex-col">
                        <p className="text-[#2D2727] font-bold text-sm mb-2">
                            Atty. David Roy Padin
                        </p>
                        <p className="text-[#585858] text-[10px] font-medium">
                            CEO and President of Cocogen Insurance
                        </p>
                    </div>
                </div>
                <p className="text-sm md:text-base leading-6 text-[#2D2727]">
                    Atty. David C. Padin is the President and Chief Executive
                    Officer of Cocogen Insurance, Inc. Under his leadership,
                    Cocogen was recognized at the Insurance Asia Awards 2024,
                    winning both Domestic General Insurer of the Year for the
                    Philippines and New Product Innovation of the Year for its
                    forward-thinking solutions in the insurance industry.
                </p>
                <p className="text-sm md:text-base leading-6 text-[#2D2727]">
                    Padin was also named Young Leader of the Year at the 27th
                    Asia Insurance Industry Awards in 2023, a recognition of his
                    strong leadership and dedication to advancing financial
                    protection for Filipinos.
                </p>
                <p className="text-sm md:text-base leading-6 text-[#2D2727]">
                    Cocogen, with Padin at the helm, has actively addressed
                    major challenges facing the Philippines, particularly in
                    disaster preparedness. In response to the country's
                    perennial ranking as number one in the World Risk Index,
                    Cocogen became the first non-life insurance company in the
                    Philippines to join ARISE Philippines in 2023, partnering
                    with the United Nations Office for Disaster Risk Reduction
                    (UNDRR). This move reflects the company’s commitment to
                    improving disaster resilience and promoting sustainable
                    business practices.
                </p>
                <p className="text-sm md:text-base leading-6 text-[#2D2727]">
                    He is passionate about making insurance more accessible and
                    meaningful. Envisioning Cocogen as a trusted partner not
                    only during times of uncertainty but also in building a more
                    secure and resilient future for all Filipinos.
                </p>
            </div>
        </div>
    );
};

export default Profile;
