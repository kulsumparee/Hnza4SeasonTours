const SocialLinks = () => {
    return (
        <ul className="flex items-start pt-20 gap-5">
            {/* WhatsApp */}
            <li className="relative group">
                <span className="absolute -top-8 left-1/2 -translate-x-1/2 opacity-0 invisible group-hover:opacity-100 group-hover:visible group-hover:-top-12 transition-all duration-300 bg-[#25D366] text-white text-sm px-3 py-1 rounded-md whitespace-nowrap">
                    WhatsApp
                </span>

                <a
                    href="https://wa.me/923468486217"
                    target="_blank"
                    rel="noopener noreferrer"
                    aria-label="WhatsApp"
                    className="relative overflow-hidden flex items-center justify-center w-12 h-12 rounded-full bg-white text-gray-600 shadow hover:shadow-xl transition-all duration-300 group"
                >
                    <span className="absolute bottom-0 left-0 w-full h-0 bg-[#25D366] group-hover:h-full transition-all duration-300"></span>
                    <svg
                        viewBox="0 0 24 24"
                        className="relative z-10 w-7 h-7 fill-current text-gray-600 group-hover:text-white transition-colors duration-300"
                    >
                        <path d="M20.52 3.48A11.82 11.82 0 0 0 12.05 0C5.49 0 .16 5.34.16 11.89c0 2.1.55 4.15 1.59 5.95L0 24l6.31-1.65a11.9 11.9 0 0 0 5.74 1.45c6.55 0 11.89-5.34 11.89-11.9a11.8 11.8 0 0 0-3.42-8.42zM12.05 21.79h-.01a9.9 9.9 0 0 1-5.04-1.38l-.36-.21-3.74.98.99-3.65-.24-.37a9.9 9.9 0 0 1-1.52-5.27C2.13 6.44 6.57 2 12.05 2a9.9 9.9 0 0 1 7.03 2.92 9.9 9.9 0 0 1 2.91 7.04c0 5.48-4.45 9.93-9.94 9.93zm5.42-7.41c-.3-.15-1.76-.87-2.03-.97-.27-.1-.47-.15-.67.15-.2.3-.77.97-.94 1.16-.17.2-.35.22-.64.08-.3-.15-1.26-.47-2.39-1.48-.89-.79-1.48-1.76-1.66-2.06-.17-.3-.02-.46.13-.61.13-.13.3-.35.45-.52.15-.18.2-.3.3-.5.1-.2.05-.37-.02-.52-.08-.15-.67-1.61-.92-2.21-.24-.58-.49-.5-.67-.51h-.57c-.2 0-.52.07-.79.37-.27.3-1.04 1.02-1.04 2.48 0 1.46 1.07 2.88 1.22 3.08.15.2 2.1 3.2 5.08 4.49.71.31 1.26.49 1.69.63.71.23 1.36.19 1.87.12.57-.09 1.76-.72 2.01-1.42.25-.69.25-1.29.17-1.41-.07-.13-.27-.2-.57-.35z" />
                    </svg>
                </a>
            </li>

            {/* Facebook */}
            <li className="relative group">
                <span className="absolute -top-8 left-1/2 -translate-x-1/2 opacity-0 invisible group-hover:opacity-100 group-hover:visible group-hover:-top-12 transition-all duration-300 bg-[#3b5998] text-white text-sm px-3 py-1 rounded-md whitespace-nowrap">
                    Facebook
                </span>

                <a
                    href="https://www.facebook.com/profile.php?id=61592243046320"
                    target="_blank"
                    rel="noopener noreferrer"
                    className="relative overflow-hidden flex items-center justify-center w-12 h-12 rounded-full bg-white text-gray-600 shadow hover:shadow-xl transition-all duration-300 group"
                >
                    <span className="absolute bottom-0 left-0 w-full h-0 bg-[#3b5998] group-hover:h-full transition-all duration-300"></span>

                    <svg
                        viewBox="0 0 24 24"
                        className="relative z-10 w-7 h-7 fill-current group-hover:text-white transition-colors duration-300"
                    >
                        <path d="M23.9981 11.9991C23.9981 5.37216 18.626 0 11.9991 0C5.37216 0 0 5.37216 0 11.9991C0 17.9882 4.38789 22.9522 10.1242 23.8524V15.4676H7.07758V11.9991H10.1242V9.35553C10.1242 6.34826 11.9156 4.68714 14.6564 4.68714C15.9692 4.68714 17.3424 4.92149 17.3424 4.92149V7.87439H15.8294C14.3388 7.87439 13.8739 8.79933 13.8739 9.74824V11.9991H17.2018L16.6698 15.4676H13.8739V23.8524C19.6103 22.9522 23.9981 17.9882 23.9981 11.9991Z" />
                    </svg>
                </a>
            </li>

            {/* Instagram */}
            <li className="relative group">
                <span className="absolute -top-8 left-1/2 -translate-x-1/2 opacity-0 invisible group-hover:opacity-100 group-hover:visible group-hover:-top-12 transition-all duration-300 bg-gradient-to-r from-[#405DE6] via-[#C13584] to-[#FD1D1D] text-white text-sm px-3 py-1 rounded-md whitespace-nowrap">
                    Instagram
                </span>

                <a
                    href="https://instagram.com"
                    target="_blank"
                    rel="noopener noreferrer"
                    className="relative overflow-hidden flex items-center justify-center w-12 h-12 rounded-full bg-white text-gray-600 shadow hover:shadow-xl transition-all duration-300 group"
                >
                    <span className="absolute bottom-0 left-0 w-full h-0 bg-gradient-to-r from-[#405DE6] via-[#C13584] to-[#FD1D1D] group-hover:h-full transition-all duration-300"></span>

                    <svg
                        viewBox="0 0 24 24"
                        className="relative z-10 w-6 h-6 fill-current group-hover:text-white transition-colors duration-300"
                    >
                        <path d="M7.75 2C4.574 2 2 4.574 2 7.75v8.5C2 19.426 4.574 22 7.75 22h8.5C19.426 22 22 19.426 22 16.25v-8.5C22 4.574 19.426 2 16.25 2h-8.5zm0 2h8.5A3.75 3.75 0 0 1 20 7.75v8.5A3.75 3.75 0 0 1 16.25 20h-8.5A3.75 3.75 0 0 1 4 16.25v-8.5A3.75 3.75 0 0 1 7.75 4zm8.75 1a1.25 1.25 0 1 0 0 2.5A1.25 1.25 0 0 0 16.5 5zM12 7a5 5 0 1 0 0 10a5 5 0 0 0 0-10zm0 2a3 3 0 1 1 0 6a3 3 0 0 1 0-6z" />
                    </svg>
                </a>
            </li>
        </ul>
    );
};

export default SocialLinks;