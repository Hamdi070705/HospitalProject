@use(Carbon\Carbon)

@extends('layouts.admin.layout')

@section('title')

@section('content')
<div class="bg-white p-24 rounded-3xl shadow-lg flex-1 ml-52 min-w-full" style="transform: translateX(125px)">
    <div class="flex justify-center mb-4">
        <b class="fas fa-power-off text-icon text-2xl">
            Welcome, Your Logged In as Admin!
    </b>
    </div>
    <div class="grid grid-cols-2 gap-6">
        <div class="bg-white p-6 rounded-lg shadow-lg flex items-center border-2 border-txt">
            <svg width="60" height="60" viewBox="0 0 126 126" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M63.9148 1.62289C62.4166 2.40031 61.6102 3.78378 61.6102 5.62717C61.6102 7.06734 61.5523 7.18327 60.8328 7.35589C52.9679 9.0846 46.8014 14.8756 44.9001 22.3373C43.8921 26.1979 43.9488 26.4285 48.6171 49.9376C51.0086 61.9807 52.9389 71.8339 52.9099 71.8628C52.852 71.8918 52.3908 72.1514 51.9019 72.4109C51.3841 72.6705 50.9519 73.0447 50.9519 73.2753C50.9519 73.996 54.9562 79.6711 57.0024 81.8899C61.958 87.1907 68.8729 91.0514 76.0183 92.5495C77.2002 92.8091 78.6694 93.0976 79.2742 93.1833C80.2544 93.3269 80.3401 93.4429 80.3401 94.2782C80.3401 95.6617 79.3321 99.5513 78.3518 101.942C76.9684 105.312 74.9234 108.453 72.2144 111.334C68.2391 115.539 63.6287 118.363 58.0104 120.006C54.7835 120.928 48.762 121.274 45.2756 120.698C38.8219 119.69 33.3484 116.895 28.5365 112.227C24.5322 108.337 21.7665 103.67 20.2104 98.0519L19.433 95.1993L19.3183 77.7105L19.2314 60.223L20.47 59.9054C26.4046 58.3783 30.5827 54.1435 31.8213 48.4382C32.3114 46.0177 32.3114 44.9807 31.8213 42.5603C31.2165 39.8236 30.0926 37.6337 28.1912 35.6164C23.5242 30.6319 16.8399 29.4223 10.6457 32.4185C8.1963 33.6004 5.34492 36.5967 4.10508 39.2755C0.244443 47.6885 5.05638 57.7723 13.8726 59.7605L15.3707 60.0781L15.5144 77.5089C15.658 92.5772 15.745 95.1993 16.1771 97.0717C17.8769 104.419 20.6716 109.518 25.8577 114.675C30.0926 118.853 33.9822 121.33 39.1104 123.001C59.3069 129.599 80.4548 116.72 83.882 95.7751L84.2562 93.4706L86.9072 93.269C98.7197 92.3467 109.524 85.5477 115.604 75.1754C116.18 74.1964 116.641 73.303 116.641 73.1581C116.641 73.0132 116.209 72.668 115.718 72.4097C115.201 72.1501 114.739 71.9195 114.71 71.8906C114.652 71.8326 116.583 62.0953 118.974 50.2249C123.67 26.8304 123.728 26.3983 122.72 22.394C120.905 15.3065 115.172 9.57349 107.911 7.61419L105.981 7.09506V5.62591C105.981 3.14875 104.368 1.27513 102.235 1.27513C100.968 1.27513 99.8147 1.99585 99.0662 3.23443C98.5471 4.04083 98.4904 4.70358 98.4904 8.62218C98.4904 12.5408 98.5484 13.2035 99.0662 14.0099C99.8147 15.2775 100.881 15.9113 102.235 15.9113C104.338 15.9113 105.981 14.1246 105.981 11.849C105.981 10.6672 106.01 10.6394 106.788 10.8121C113.241 12.3682 118.342 17.7269 119.666 24.3533L120.127 26.6868L115.949 47.8334C113.644 59.4733 111.685 69.2685 111.598 69.6427C111.455 70.2185 111.368 70.2475 110.82 69.9602C110.387 69.7297 110.157 69.7297 110.071 69.9313C109.812 70.7377 107.68 73.9355 106.239 75.6932C102.955 79.6975 96.962 83.5871 91.8918 84.9416C84.6594 86.9324 77.398 86.2407 70.686 82.9559C65.7884 80.5354 61.5245 76.6458 58.6719 71.9788C58.0961 70.9985 57.548 70.0774 57.519 69.9325C57.4321 69.7019 57.2027 69.7309 56.7983 69.9615C56.2792 70.2211 56.1355 70.1921 56.0209 69.7599C55.9339 69.5003 53.9759 59.7341 51.6701 48.0942L47.4352 26.9476L47.8964 24.5272C49.106 17.9008 54.2921 12.3694 60.8328 10.8133C61.5825 10.6407 61.6102 10.6697 61.6102 11.8503C61.6102 14.1259 63.252 15.9125 65.3562 15.9125C66.7107 15.9125 67.7767 15.2788 68.5251 14.0112C69.043 13.2048 69.1009 12.542 69.1009 8.62344C69.1009 4.70484 69.043 4.04208 68.5251 3.23569C67.4302 1.42129 65.5578 0.787506 63.9148 1.62289ZM20.2948 38.7324C21.706 39.3082 23.3201 40.9223 24.0408 42.4784C25.3953 45.331 24.6456 48.8741 22.2831 50.9494C20.756 52.2749 19.4305 52.765 17.3855 52.765C14.5618 52.765 12.4589 51.5554 10.9607 48.9913C10.298 47.8674 10.1833 47.3495 10.1833 45.4759C10.1833 43.5456 10.298 43.1424 11.0477 41.9038C13.1216 38.5585 16.8374 37.291 20.2948 38.7324Z" fill="#FFB800"/>
                </svg>
            <div class="ml-7">
                <h2 class="text-txt text-lg font-semibold">
                    Dokter
                </h2>
                <p class="text-txt">
                    Total
                </p>
                <p class="text-2xl text-txt font-bold">
                    {{$dokterCount}}
                </p>
            </div>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md flex items-center border-2 border-txt">
            <svg width="60" height="60" viewBox="0 0 126 126" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M56.5563 1.46664C50.3773 2.22768 43.9059 3.95513 39.3094 6.03539C33.5991 8.67132 28.5629 13.2388 26.2495 17.9537C23.8782 22.7858 23.9362 22.2881 23.819 39.0083L23.7308 53.8549L21.8269 54.7331C18.4879 56.2842 15.8823 59.593 14.8276 63.5758C14.272 65.5969 14.272 69.6956 14.8276 71.7167C16.0864 76.4896 20.0982 80.6778 24.0811 81.2927C25.0185 81.4388 25.1937 81.6152 25.9257 83.3137C27.8586 87.7653 31.7242 93.6797 36.2628 99.0675L38.6933 101.996V112.89C38.6933 123.081 38.7223 123.813 39.22 124.251C39.7769 124.778 40.9474 124.895 41.5044 124.514C42.3826 123.929 42.4998 122.904 42.4998 114.646V106.271L46.5116 109.96C48.7368 112.01 51.665 114.528 53.0422 115.553L55.5307 117.428H62.9974H70.4642L72.8065 115.672C74.0653 114.734 76.9935 112.217 79.3069 110.108L83.4939 106.272V114.647C83.4939 122.905 83.611 123.93 84.4893 124.516C85.0751 124.925 86.3339 124.75 86.8026 124.223C87.2424 123.726 87.3003 122.525 87.3003 112.832V101.997L89.7309 99.0688C94.2694 93.681 98.135 87.7653 100.068 83.315C100.8 81.6165 100.976 81.4401 101.913 81.2939C105.836 80.6791 109.936 76.4328 111.195 71.631C111.722 69.6982 111.722 65.5691 111.166 63.5783C110.142 59.6547 107.477 56.2867 104.167 54.7344L102.263 53.8562L102.175 39.0096C102.057 24.6317 102.028 24.1038 101.414 22.0261C98.222 11.5429 88.646 4.74894 73.2438 2.05506C69.0895 1.32048 60.2456 1.0269 56.5563 1.46664ZM73.4227 5.83002C87.478 8.49492 95.7952 14.7029 98.0494 24.2197C98.5471 26.3277 98.576 28.3198 98.576 51.5403V76.5778L97.786 78.9201C95.6188 85.2743 90.2021 93.2387 82.2074 101.908C78.8104 105.597 73.7742 110.312 71.1093 112.332L69.3819 113.62H62.9987H56.6155L55.0632 112.449C52.135 110.253 46.9513 105.362 43.4082 101.497C35.3845 92.6831 30.5524 85.5956 28.3852 79.3586L27.4188 76.5765V51.2467V25.9182L28.0929 23.5759C30.817 14.2052 39.0738 8.23158 52.6024 5.86026C57.3173 5.04 57.3463 5.03999 64.0231 5.1282C68.767 5.1849 70.9039 5.3613 73.4227 5.83002ZM23.8467 77.2506C23.7295 77.5139 21.8849 76.3132 20.9475 75.3467C16.5841 71.0123 17.3161 61.9643 22.2944 58.8017L23.6124 57.9524L23.7585 67.5574C23.8467 72.8293 23.8757 77.1926 23.8467 77.2506ZM103.819 58.8319C106.338 60.5884 107.86 63.7812 107.889 67.4995C107.918 70.2815 107.332 72.2434 105.898 74.2631C105.049 75.4349 102.852 77.3086 102.267 77.3086C102.178 77.3086 102.12 72.9742 102.178 67.6456C102.207 62.3448 102.325 57.9827 102.413 57.9827C102.501 57.9827 103.116 58.3632 103.819 58.8319Z" fill="#FFB800"/>
                <path d="M58.8103 18.275C56.9367 18.9781 55.4424 20.1197 54.5931 21.5838C53.89 22.8136 53.7729 23.2823 53.7729 25.3323C53.7729 28.3487 54.0954 28.9044 57.9019 32.7991L60.8881 35.8735L57.6083 39.2414C55.15 41.7892 54.2428 42.9017 53.9782 43.8089C52.4259 49.0795 56.4088 54.0578 61.7386 53.5021C63.9058 53.2678 65.2817 52.3895 68.5325 49.0808L71.3146 46.2987L74.389 49.2849C78.1375 52.9162 79.1039 53.4429 81.886 53.4429C84.3165 53.4139 85.7806 52.7701 87.3619 51.0124C88.6497 49.6062 89.1776 48.0841 89.1776 45.9761C89.1486 43.6628 88.2994 42.1987 84.8734 38.7437L81.9162 35.7273L85.167 32.4475C88.6812 28.8162 89.1789 27.909 89.1789 25.1559C89.1209 19.9433 83.3514 16.312 78.7246 18.6253C78.2269 18.8886 76.3823 20.4989 74.6548 22.1974L71.5212 25.3008L68.3586 22.2264C66.6312 20.5279 64.6983 18.9176 64.0834 18.6241C62.5588 17.9235 60.1863 17.7483 58.8103 18.275ZM62.647 22.0815C64.023 22.8136 85.1947 44.2777 85.4001 45.1861C85.957 47.4415 84.2296 49.7839 82.0032 49.7839C81.3593 49.7839 80.4811 49.6087 80.0413 49.3744C79.6016 49.14 74.36 44.0446 68.3863 38.0129C56.7024 26.271 56.7616 26.3579 57.5226 24.1038C58.1665 22.0815 60.7432 21.0861 62.647 22.0815ZM84.4324 22.7556C85.516 23.8392 85.8084 25.5667 85.1645 26.8254C84.9012 27.2941 83.466 28.9044 81.9729 30.3975L79.2501 33.0914L76.6141 30.4555L73.9795 27.8208L76.1757 25.5956C79.5726 22.1407 80.4219 21.5838 82.1203 21.7589C83.2027 21.8471 83.7596 22.0815 84.4324 22.7556ZM65.6043 46.7082L62.5009 49.7826H61.0078C59.1631 49.7826 57.9044 48.8452 57.4357 47.1467C56.967 45.4482 57.6121 44.2777 60.7155 41.0848L63.4093 38.3317L66.0742 40.9966L68.7076 43.6338L65.6043 46.7082Z" fill="#FFB800"/>
                </svg>
            <div class="ml-7">
                <h2 class="text-txt text-lg font-semibold">
                    Pasien
                </h2>
                <p class="text-txt">
                    Total
                </p>
                <p class="text-2xl text-txt font-bold">
                    {{$pasienCount}}
                </p>
            </div>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md flex items-center border-2 border-txt">
            <svg width="60" height="60" viewBox="0 0 70 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1.97325 9.58931C1.47765 9.8035 1.03525 10.2865 0.847651 10.7821C0.740551 11.0502 0.699951 17.1472 0.699951 30.5879C0.699951 49.6433 0.699951 50.0318 0.968051 50.5274C1.11575 50.8221 1.43705 51.1707 1.67855 51.3317C2.13425 51.6131 2.14755 51.6131 16.03 51.6131H29.9124V53.8111V56.0084L28.8134 56.0889C28.1967 56.1288 26.8302 56.196 25.7579 56.2359C18.8566 56.5173 13.1614 57.442 13.3224 58.2729C13.7242 60.4569 38.8633 61.3816 51.9553 59.7065C55.8012 59.2109 57.5294 58.4738 56.3107 57.8438C54.9709 57.1606 49.7314 56.4501 44.2505 56.2359C43.1787 56.196 41.8116 56.1288 41.2082 56.0889L40.096 56.0084V53.8111V51.6131H54.0056H67.902L68.3976 51.2778C69.3755 50.6079 69.3223 52.0821 69.2818 30.2799C69.2419 10.8094 69.2419 10.7555 68.9604 10.3936C68.8128 10.1927 68.518 9.89801 68.3171 9.75031L67.9553 9.4689L35.1645 9.44231C8.04295 9.415 2.30785 9.4416 1.97325 9.58931ZM64.8473 22.6947L64.8738 32.5843H58.6159H52.3578L51.8217 31.2039C50.2669 27.1971 49.7314 25.9245 49.4634 25.7096C49.0476 25.3743 48.2439 25.4149 47.8954 25.7901C47.6812 26.0176 45.1618 31.5119 44.2904 33.6427C44.2372 33.7365 43.808 32.9861 43.3125 31.9676C42.8308 30.9358 42.308 30.0111 42.1869 29.904C42.0532 29.7969 41.7046 29.7031 41.4099 29.7031C40.6728 29.7031 40.3913 30.065 39.6949 31.9676C39.3736 32.8251 39.0788 33.5223 39.0382 33.5223C38.9851 33.5223 38.355 30.4269 37.6312 26.6476C36.8941 22.8823 36.2376 19.6525 36.1704 19.4782C36.0227 19.1429 35.4333 18.781 35.0714 18.781C34.7228 18.781 34.1068 19.1961 33.9724 19.5048C33.9052 19.6658 33.1548 22.2789 32.3239 25.3071C31.4804 28.35 30.7432 30.842 30.69 30.842C30.6361 30.842 30.0069 29.7031 29.3097 28.2961C28.5992 26.8758 27.9292 25.6963 27.7822 25.6158C27.3671 25.4016 26.6434 25.4548 26.3347 25.7362C26.1877 25.8839 25.7046 26.6343 25.2762 27.4113C24.8471 28.1883 24.4587 28.8316 24.4187 28.8316C24.3788 28.8316 24.017 27.1831 23.6145 25.1734C22.9578 21.8638 22.864 21.4886 22.5287 21.1533C22.0597 20.6843 21.3226 20.6577 20.8942 21.0861C20.68 21.3136 20.1439 22.8949 18.9244 26.915L17.2627 32.4492H11.2056H5.14915V22.708C5.14915 17.3481 5.17575 12.9122 5.20305 12.8723C5.22965 12.8184 18.6571 12.7785 35.0454 12.7918L64.8206 12.8184L64.8473 22.6947ZM36.1437 32.1153C36.787 35.5054 37.3764 38.4804 37.4436 38.7219C37.5914 39.2448 38.0869 39.5927 38.6365 39.5794C39.4134 39.5661 39.6011 39.298 40.4187 37.114C40.8478 35.9884 41.2894 34.8628 41.3832 34.608L41.5842 34.139L42.4284 35.8946C43.2992 37.6768 43.6344 38.0786 44.2637 38.0786C44.9875 38.0786 45.2283 37.6768 46.944 33.7904C47.8554 31.7401 48.6458 30.0923 48.6864 30.1455C48.727 30.1994 49.1553 31.2179 49.611 32.41C50.0667 33.6028 50.5756 34.6878 50.71 34.8222C50.9648 35.0497 51.5003 35.0637 57.906 35.1302L64.8206 35.1974L64.8339 39.6466L64.8605 44.1091H35.0049H5.13585L5.14915 39.5528V35.0098L11.9161 34.9692L18.683 34.9293L19.0316 34.5275C19.313 34.2195 19.6343 33.3214 20.3987 30.7489C20.9482 28.8862 21.4305 27.412 21.4844 27.4659C21.5243 27.5198 21.7924 28.6986 22.0604 30.1056C22.3286 31.4993 22.6232 32.8258 22.7038 33.0267C22.9984 33.7638 24.2178 34.0053 24.7134 33.4152C24.8206 33.2948 25.3834 32.3435 25.9594 31.311C26.5223 30.2792 27.0179 29.4084 27.0452 29.3811C27.0585 29.3545 27.7283 30.6271 28.5061 32.1951C29.2964 33.7764 30.0468 35.1701 30.1679 35.3171C30.7846 36.0276 31.8023 35.8393 32.1915 34.9419C32.3119 34.6472 32.9552 32.4492 33.6119 30.0643C34.2551 27.6927 34.8312 25.7894 34.8712 25.8433C34.9244 25.9112 35.4871 28.7252 36.1437 32.1153ZM35.2457 45.6092C35.4333 45.7968 35.4599 47.8205 35.2855 48.1019C35.2183 48.209 35.0581 48.2629 34.9236 48.2363C34.6962 48.1964 34.6688 48.0487 34.6289 47.0036C34.6023 46.347 34.6157 45.7303 34.6555 45.6232C34.75 45.4083 35.0315 45.395 35.2457 45.6092ZM34.2006 46.7481C34.2006 46.8685 34.0802 47.2304 33.9324 47.5384C33.7449 47.9136 33.6777 48.2216 33.7449 48.4498C33.852 48.9188 34.5352 49.4683 35.0042 49.4683C35.4732 49.4683 36.1563 48.9188 36.2641 48.4498C36.3314 48.2223 36.2641 47.9136 36.0765 47.5384C35.6341 46.6137 35.7552 46.2252 36.304 46.8146C37.4835 48.1145 36.7059 50.0437 35.0042 50.0437C33.3025 50.0437 32.5247 48.1145 33.7043 46.8146C34.0262 46.4667 34.2006 46.4401 34.2006 46.7481Z" fill="#FFB800"/>
                </svg>
            <div class="ml-7">
                <h2 class="text-txt text-lg font-semibold">
                    Dokter Aktif Hari Ini ({{ Carbon::now()->translatedFormat('l') }})
                </h2>
                <p class="text-txt">
                    Total
                </p>
                <p class="text-2xl text-txt font-bold">
                    {{ $activeDoctorCount }}
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
