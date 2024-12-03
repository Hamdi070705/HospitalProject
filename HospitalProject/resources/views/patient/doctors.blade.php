@extends('layouts.patient.layout')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h2 class="text-3xl font-bold text-txt mb-8 text-center tracking-wide">
            Dokter Yang Tersedia Untuk {{ $service->nama_layanan }}
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @forelse ($doctors as $doctor)
                <div class="transform transition duration-300 ease-in-out hover:scale-105">
                    <div class="bg-white shadow-xl rounded-xl overflow-hidden hover:shadow-2xl">
                        <div class="p-6 space-y-4">
                            <div class="flex items-center justify-between">
                                <h5 class="text-xl font-semibold text-txt tracking-wider">
                                    dr. {{ $doctor->name }}
                                </h5>
                                <svg width="35" height="35" viewBox="0 0 126 126" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M63.9148 1.62289C62.4166 2.40031 61.6102 3.78378 61.6102 5.62717C61.6102 7.06734 61.5523 7.18327 60.8328 7.35589C52.9679 9.0846 46.8014 14.8756 44.9001 22.3373C43.8921 26.1979 43.9488 26.4285 48.6171 49.9376C51.0086 61.9807 52.9389 71.8339 52.9099 71.8628C52.852 71.8918 52.3908 72.1514 51.9019 72.4109C51.3841 72.6705 50.9519 73.0447 50.9519 73.2753C50.9519 73.996 54.9562 79.6711 57.0024 81.8899C61.958 87.1907 68.8729 91.0514 76.0183 92.5495C77.2002 92.8091 78.6694 93.0976 79.2742 93.1833C80.2544 93.3269 80.3401 93.4429 80.3401 94.2782C80.3401 95.6617 79.3321 99.5513 78.3518 101.942C76.9684 105.312 74.9234 108.453 72.2144 111.334C68.2391 115.539 63.6287 118.363 58.0104 120.006C54.7835 120.928 48.762 121.274 45.2756 120.698C38.8219 119.69 33.3484 116.895 28.5365 112.227C24.5322 108.337 21.7665 103.67 20.2104 98.0519L19.433 95.1993L19.3183 77.7105L19.2314 60.223L20.47 59.9054C26.4046 58.3783 30.5827 54.1435 31.8213 48.4382C32.3114 46.0177 32.3114 44.9807 31.8213 42.5603C31.2165 39.8236 30.0926 37.6337 28.1912 35.6164C23.5242 30.6319 16.8399 29.4223 10.6457 32.4185C8.1963 33.6004 5.34492 36.5967 4.10508 39.2755C0.244443 47.6885 5.05638 57.7723 13.8726 59.7605L15.3707 60.0781L15.5144 77.5089C15.658 92.5772 15.745 95.1993 16.1771 97.0717C17.8769 104.419 20.6716 109.518 25.8577 114.675C30.0926 118.853 33.9822 121.33 39.1104 123.001C59.3069 129.599 80.4548 116.72 83.882 95.7751L84.2562 93.4706L86.9072 93.269C98.7197 92.3467 109.524 85.5477 115.604 75.1754C116.18 74.1964 116.641 73.303 116.641 73.1581C116.641 73.0132 116.209 72.668 115.718 72.4097C115.201 72.1501 114.739 71.9195 114.71 71.8906C114.652 71.8326 116.583 62.0953 118.974 50.2249C123.67 26.8304 123.728 26.3983 122.72 22.394C120.905 15.3065 115.172 9.57349 107.911 7.61419L105.981 7.09506V5.62591C105.981 3.14875 104.368 1.27513 102.235 1.27513C100.968 1.27513 99.8147 1.99585 99.0662 3.23443C98.5471 4.04083 98.4904 4.70358 98.4904 8.62218C98.4904 12.5408 98.5484 13.2035 99.0662 14.0099C99.8147 15.2775 100.881 15.9113 102.235 15.9113C104.338 15.9113 105.981 14.1246 105.981 11.849C105.981 10.6672 106.01 10.6394 106.788 10.8121C113.241 12.3682 118.342 17.7269 119.666 24.3533L120.127 26.6868L115.949 47.8334C113.644 59.4733 111.685 69.2685 111.598 69.6427C111.455 70.2185 111.368 70.2475 110.82 69.9602C110.387 69.7297 110.157 69.7297 110.071 69.9313C109.812 70.7377 107.68 73.9355 106.239 75.6932C102.955 79.6975 96.962 83.5871 91.8918 84.9416C84.6594 86.9324 77.398 86.2407 70.686 82.9559C65.7884 80.5354 61.5245 76.6458 58.6719 71.9788C58.0961 70.9985 57.548 70.0774 57.519 69.9325C57.4321 69.7019 57.2027 69.7309 56.7983 69.9615C56.2792 70.2211 56.1355 70.1921 56.0209 69.7599C55.9339 69.5003 53.9759 59.7341 51.6701 48.0942L47.4352 26.9476L47.8964 24.5272C49.106 17.9008 54.2921 12.3694 60.8328 10.8133C61.5825 10.6407 61.6102 10.6697 61.6102 11.8503C61.6102 14.1259 63.252 15.9125 65.3562 15.9125C66.7107 15.9125 67.7767 15.2788 68.5251 14.0112C69.043 13.2048 69.1009 12.542 69.1009 8.62344C69.1009 4.70484 69.043 4.04208 68.5251 3.23569C67.4302 1.42129 65.5578 0.787506 63.9148 1.62289ZM20.2948 38.7324C21.706 39.3082 23.3201 40.9223 24.0408 42.4784C25.3953 45.331 24.6456 48.8741 22.2831 50.9494C20.756 52.2749 19.4305 52.765 17.3855 52.765C14.5618 52.765 12.4589 51.5554 10.9607 48.9913C10.298 47.8674 10.1833 47.3495 10.1833 45.4759C10.1833 43.5456 10.298 43.1424 11.0477 41.9038C13.1216 38.5585 16.8374 37.291 20.2948 38.7324Z" fill="#FFB800"/>
                                    </svg>
                            </div>
                            <div class="pt-4 border-t border-gray-200">
                                <a href="{{ route('patient.schedule', ['doctor' => $doctor->id, 'service_id' => $service->id]) }}"
                                    class="block w-full text-center px-4 py-2 bg-primary text-white rounded-lg
                                          hover:bg-buttonH transition duration-300 ease-in-out
                                          transform hover:-translate-y-1 hover:shadow-lg
                                          focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-50">
                                    Lihat Jadwal
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-8">
                    <p class="text-gray-600 text-xl">Tidak Ada Dokter yang Tersedia Untuk Layanan Ini</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection