import React from 'react'

function PaperSubmission({ isOpen, onClose, title, children, onConfirm, confirmLabel = "Confirm", cancelLabel = "Cancel" }) {
  if (!isOpen) return null;

  return (
    <div className="fixed inset-0 left-0 right-0 z-50 w-full p-4 overflow-x-hidden  max-h-full bg-black bg-opacity-40 flex items-center justify-center">
      <div className="relative w-full max-w-md max-h-full">
        <div className="relative bg-white rounded-2xl shadow-md text-center m-7 md:m-0 p-7 md:p-9">
          <div className="flex justify-center mb-4 mt-4">
            <svg width="58" height="41" viewBox="0 0 58 41" fill="none" xmlns="http://www.w3.org/2000/svg" className='md:w-[58px] md:h-[41px] w-[35px] h-[35px]'>
<path d="M20.8438 16.4375C20.8438 15.8988 21.0578 15.3821 21.4387 15.0012C21.8196 14.6203 22.3363 14.4062 22.875 14.4062H43.1875C43.7262 14.4062 44.2429 14.6203 44.6238 15.0012C45.0047 15.3821 45.2188 15.8988 45.2188 16.4375C45.2188 16.9762 45.0047 17.4929 44.6238 17.8738C44.2429 18.2547 43.7262 18.4688 43.1875 18.4688H22.875C22.3363 18.4688 21.8196 18.2547 21.4387 17.8738C21.0578 17.4929 20.8438 16.9762 20.8438 16.4375ZM22.875 26.5938H43.1875C43.7262 26.5938 44.2429 26.3797 44.6238 25.9988C45.0047 25.6179 45.2188 25.1012 45.2188 24.5625C45.2188 24.0238 45.0047 23.5071 44.6238 23.1262C44.2429 22.7453 43.7262 22.5312 43.1875 22.5312H22.875C22.3363 22.5312 21.8196 22.7453 21.4387 23.1262C21.0578 23.5071 20.8438 24.0238 20.8438 24.5625C20.8438 25.1012 21.0578 25.6179 21.4387 25.9988C21.8196 26.3797 22.3363 26.5938 22.875 26.5938ZM57.4062 4.25V34.7188C57.4062 36.3349 56.7642 37.8849 55.6214 39.0277C54.4786 40.1705 52.9287 40.8125 51.3125 40.8125H6.625C5.01366 40.8125 3.46791 40.1743 2.32591 39.0376C1.18391 37.9008 0.538635 36.358 0.53125 34.7467V10.3438C0.53125 9.80503 0.745256 9.28837 1.12619 8.90744C1.50712 8.52651 2.02378 8.3125 2.5625 8.3125C3.10122 8.3125 3.61788 8.52651 3.99881 8.90744C4.37974 9.28837 4.59375 9.80503 4.59375 10.3438V34.7188C4.59375 35.2575 4.80776 35.7741 5.18869 36.1551C5.56962 36.536 6.08628 36.75 6.625 36.75C7.16372 36.75 7.68038 36.536 8.06131 36.1551C8.44224 35.7741 8.65625 35.2575 8.65625 34.7188V4.25C8.65625 3.17256 9.08426 2.13925 9.84613 1.37738C10.608 0.615512 11.6413 0.1875 12.7188 0.1875H53.3438C54.4212 0.1875 55.4545 0.615512 56.2164 1.37738C56.9782 2.13925 57.4062 3.17256 57.4062 4.25ZM53.3438 4.25H12.7188V34.7188C12.7198 35.4107 12.6021 36.0978 12.3709 36.75H51.3125C51.8512 36.75 52.3679 36.536 52.7488 36.1551C53.1297 35.7741 53.3438 35.2575 53.3438 34.7188V4.25Z" fill="#217B7E"/>
</svg>

         </div>

      <p className="md:text-[27px] text-lg font-bold text-[#2D2727] m-2 mb-4 md:m-8">Paper-Based Claim Submission</p>
      <p className="md:text-base text-sm font-medium text-[#585858]">
        <span>If you prefer paper-based claim <br className="block md:hidden" /> submission, </span>
        <span> you may visit the nearest <br className="block md:hidden" /> Cocogen office.</span>
      </p>

      <div className="mt-8 flex flex-col gap-4 justify-center text-center">
            <a
              href="https://www.cocogen.com/locate-a-branch"
              className="w-full bg-[#E4509A] text-white py-3 rounded-full font-bold md:text-base text-sm hover:bg-[#d4438e] transition"
            >Locate a Branch
            </a>
            <button
              onClick={onClose}
              className="w-full text-[#E4509A] border border-[#E4509A] py-3 rounded-full font-bold md:text-base text-sm hover:bg-pink-50 transition"
            >Close
            </button>
          </div>
        </div>
      </div>
    </div>
  );
}
export default PaperSubmission