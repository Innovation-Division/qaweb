import React, {useEffect, useState} from 'react'
import claimsBanner from "../../assets/images/claims-banner.png";
import mobileBanner from "../../assets/images/Banner2.png";
import taglineImage from "../../assets/images/tagline.png";
import axios from 'axios';
function SuccessPage() {
    const [countdown, setCountdown] = useState(3);

      useEffect(() => {
      window.scrollTo(0, 0);
    }, []);

  useEffect(() => {
  const policy_no = localStorage.getItem('policy_no');

  if (!policy_no) {
    navigate("/file-a-claim");
    return;
  }

  const emailSent = sessionStorage.getItem("emailSent");
  // if (emailSent === "true") return;

  const triggerEmail = async () => {
    try {
      await axios.post('/api/send-email', { policy_no });
      sessionStorage.setItem("emailSent", "true"); 
    } catch (err) {
      // console.error("Failed ...:", err);
    }
  };

  triggerEmail();

  const interval = setInterval(() => {
    setCountdown((prev) => {
      if (prev <= 1) {
        clearInterval(interval);
        return 0;
      }
      return prev - 1;
    });
  }, 1000);

  const timeout = setTimeout(() => {
    sessionStorage.removeItem("emailSent");
    localStorage.removeItem("policy_no");
    window.location.href = '/file-a-claim?status=claim-success';
  }, 3000);

  return () => {
    clearInterval(interval);
    clearTimeout(timeout);
  };
}, []);

  return (
    <div className="flex flex-col items-center justify-center gap-6 w-full">
                 <div className="-mt-5 w-full">
                              <div className="block sm:hidden relative w-full ">
                                
                              <img 
                                src={mobileBanner}
                                className="w-full h-full object-cover"
                                alt="Online Claims Banner"
                              />
                            
                              <div className="absolute top-6 text-center w-full h-full px-4">
                                <div className="relative size-32">
                                  <div className="absolute inset-y-1 left-[-15px] w-auto whitespace-nowrap text-xl font-bold text-white ml-4 flex gap-4 font-mono leading-[1.5]">
                                    Online Claims
                                  </div>
                                </div>
                              </div>
                            
                            <div className="absolute top-4 right-1 text-left font-medium text-[#2D2727] text-[9px] font-mono leading-[1] mr-2 mt-3">
                              <div>COMMITTED.</div>
                              <div>COMPASSIONATE.</div>
                              <div>GENUINE.</div>
                            </div>
                            
                            </div>
                            
                            
                            <div className="relative w-full hidden sm:block h-[170px] md:h-[180px]">
                              <img
                                src={claimsBanner}
                                className="w-full h-full object-cover"
                                alt="Online Claims Banner"
                              />
                            
                             <div className="absolute top-[47%] left-9 text-white font-mono font-bold text-2xl md:text-4xl lg:text-5xl leading-tight">
                                Online Claims
                              </div>
                            
                        <div className="absolute top-[-2rem] md:top-[-2rem] lg:top-[-5rem] right-6 md:right-12 lg:right-2">
                        <img 
                            src={taglineImage} 
                            alt="Committed Compassionate Genuine" 
                            className="w-[160px] sm:w-[220px] md:w-[260px] lg:w-[375px] object-contain"
                          />
                        </div>
                            
                            </div>
                            </div>
                            <div className='flex flex-col items-center justify-center text-center gap-2'>
                            <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg" className='mt-[35px] mb-[10px]'>
<path d="M26.2325 10.8525C25.7612 10.36 25.2738 9.8525 25.09 9.40625C24.92 8.9975 24.91 8.32 24.9 7.66375C24.8813 6.44375 24.8612 5.06125 23.9 4.1C22.9387 3.13875 21.5562 3.11875 20.3363 3.1C19.68 3.09 19.0025 3.08 18.5938 2.91C18.1488 2.72625 17.64 2.23875 17.1475 1.7675C16.285 0.93875 15.305 0 14 0C12.695 0 11.7162 0.93875 10.8525 1.7675C10.36 2.23875 9.8525 2.72625 9.40625 2.91C9 3.08 8.32 3.09 7.66375 3.1C6.44375 3.11875 5.06125 3.13875 4.1 4.1C3.13875 5.06125 3.125 6.44375 3.1 7.66375C3.09 8.32 3.08 8.9975 2.91 9.40625C2.72625 9.85125 2.23875 10.36 1.7675 10.8525C0.93875 11.715 0 12.695 0 14C0 15.305 0.93875 16.2837 1.7675 17.1475C2.23875 17.64 2.72625 18.1475 2.91 18.5938C3.08 19.0025 3.09 19.68 3.1 20.3363C3.11875 21.5562 3.13875 22.9387 4.1 23.9C5.06125 24.8612 6.44375 24.8813 7.66375 24.9C8.32 24.91 8.9975 24.92 9.40625 25.09C9.85125 25.2738 10.36 25.7612 10.8525 26.2325C11.715 27.0613 12.695 28 14 28C15.305 28 16.2837 27.0613 17.1475 26.2325C17.64 25.7612 18.1475 25.2738 18.5938 25.09C19.0025 24.92 19.68 24.91 20.3363 24.9C21.5562 24.8813 22.9387 24.8612 23.9 23.9C24.8612 22.9387 24.8813 21.5562 24.9 20.3363C24.91 19.68 24.92 19.0025 25.09 18.5938C25.2738 18.1488 25.7612 17.64 26.2325 17.1475C27.0613 16.285 28 15.305 28 14C28 12.695 27.0613 11.7162 26.2325 10.8525ZM19.7075 11.7075L12.7075 18.7075C12.6146 18.8005 12.5043 18.8742 12.3829 18.9246C12.2615 18.9749 12.1314 19.0008 12 19.0008C11.8686 19.0008 11.7385 18.9749 11.6171 18.9246C11.4957 18.8742 11.3854 18.8005 11.2925 18.7075L8.2925 15.7075C8.10486 15.5199 7.99944 15.2654 7.99944 15C7.99944 14.7346 8.10486 14.4801 8.2925 14.2925C8.48014 14.1049 8.73464 13.9994 9 13.9994C9.26536 13.9994 9.51986 14.1049 9.7075 14.2925L12 16.5863L18.2925 10.2925C18.3854 10.1996 18.4957 10.1259 18.6171 10.0756C18.7385 10.0253 18.8686 9.99944 19 9.99944C19.1314 9.99944 19.2615 10.0253 19.3829 10.0756C19.5043 10.1259 19.6146 10.1996 19.7075 10.2925C19.8004 10.3854 19.8741 10.4957 19.9244 10.6171C19.9747 10.7385 20.0006 10.8686 20.0006 11C20.0006 11.1314 19.9747 11.2615 19.9244 11.3829C19.8741 11.5043 19.8004 11.6146 19.7075 11.7075Z" fill="#09A12A"/>
</svg>

                             <p className="font-bold md:text-[25px] text-lg text-[#2D2727] mb-[20px]">
                          Your claim has been successfully submitted
                        </p>

        <div className="block md:hidden font-normal text-sm text-[#585858] leading-relaxed text-center mb-0">
          Your claim has been successfully submitted.<br />
          You will receive a confirmation shortly.<br />
          <br />
          Thank you for trusting Cocogen Insurance<br />
          <br />
          In the meantime, you may explore our{" "}
          <a
            href="https://www.cocogen.com/client-services"
            target="_blank"
            rel="noopener noreferrer"
            className="text-[#E4509A] font-bold cursor-pointer"
          >
            Contact
          </a>{" "}
          page <br /> should you have questions.

          <div className='justify-center items-center text-center gap-5 m-8'>
                <p className='font-extrabold md:text-base text-sm text-[#6A6F74]'>
                  You are being redirected to another page in {countdown}...
                </p>
              </div>
        </div>

      <div className="hidden md:block font-normal md:text-base text-sm text-[#585858] text-center">
        <p>Your claim has been successfully submitted. You will receive a confirmation shortly.</p>
        <br />
        <p>Thank you for trusting Cocogen Insurance</p>
        <br />
        <p>
          In the meantime, you may explore our{" "}
          <a
            href="https://www.cocogen.com/client-services"
            target="_blank"
            rel="noopener noreferrer"
            className="text-[#E4509A] font-bold cursor-pointer"
          >
            Contact
          </a>{" "}
          page should you have questions.
        </p>
        <div className='justify-center items-center text-center gap-5 mt-20 mb-12'>
              <p className='font-extrabold md:text-base text-sm text-[#6A6F74]'>
                You are being redirected to another page in {countdown}...
              </p>
            </div>
      </div>
          </div>
              </div>
  )
}

export default SuccessPage