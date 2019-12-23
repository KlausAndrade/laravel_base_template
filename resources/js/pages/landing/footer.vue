<template>
    <div>
        <!--Footer-->
        <footer class="bg-white">
            <div class="container mx-auto  px-8">
                <div class="w-full flex flex-col md:flex-row py-6">
                    <div class="flex-1 mb-6">
                        <router-link
                            class="text-green-500 no-underline hover:no-underline font-bold text-2xl lg:text-4xl"
                            :to="{ name: 'home' }"
                        >
                            <img
                                src="/img/logo/just-book-it-logo.svg"
                                :alt="appName + ' logo'"
                                class="w-48"
                            />
                        </router-link>
                    </div>

                    <div class="flex-1">
                        <p class="uppercase text-gray-500 md:mb-6">
                            Links
                        </p>
                        <links
                            class="flex flex-col"
                            colors="text-black-900"
                            color="hover:text-green-500"
                        />
                    </div>
                    <div class="flex-1">
                        <p class="uppercase text-gray-500 md:mb-6">
                            Legal
                        </p>
                        <ul class="list-reset mb-6">
                            <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                                <router-link
                                    class="no-underline text-gray-800 hover:text-green-500"
                                    :to="{ name: 'terms' }"
                                >
                                    {{ $t("terms") }}
                                </router-link>
                            </li>
                            <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                                <router-link
                                    class="no-underline text-gray-800 hover:text-green-500"
                                    :to="{ name: 'privacy' }"
                                >
                                    {{ $t("privacy") }}
                                </router-link>
                            </li>
                        </ul>
                    </div>
                    <div class="flex-1">
                        <p class="uppercase text-gray-500 md:mb-6">
                            Social
                        </p>
                        <ul class="list-reset mb-6">
                            <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                                <a
                                    href="https://www.facebook.com/Just-Book-It-116935079707977/"
                                    target="_blank"
                                    class="no-underline text-gray-800 hover:text-green-500"
                                    >Facebook</a
                                >
                            </li>
                            <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                                <a
                                    href="https://instagram.com/justbookit_pt"
                                    target="_blank"
                                    class="no-underline text-gray-800 hover:text-green-500"
                                    >Instagram</a
                                >
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</template>

<script>
import Links from "../../components/Links";
export default {
    components: { Links },
    data: () => ({
        appName: window.config.appName
    })
};
</script>
