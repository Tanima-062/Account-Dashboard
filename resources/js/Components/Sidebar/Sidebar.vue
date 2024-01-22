<template>
    <!-- Sidebar  -->
    <nav
        id="sidebar"
        class="h-auto ease-in-out duration-300 shadow-[4px_0px_4px_rgba(222,_236,_250,_0.5)]"
        :class="{ 'w-[315px]': sidebarFullView, 'w-[100px]': !sidebarFullView }"
    >
        <div
            class="ml-8 relative min-h-content h-screen"
            :class="{ 'collapse-nav': !sidebarFullView }"
        >
            <div class="flex items-center mt-5">
                <div class="">
                    <ManIcon class="icon" />
                </div>
                <div class="flex flex-col mr-6 ml-2 cursor-pointer hide-on-collapse ease-in-out duration-300">
                    <span class="full__name text-18 Montserrat font-bold text-base whitespace-nowrap">
                            Tanima Yousuf
                    </span>
                    <span class="user__type text-16 Montserrat font-normal text-base whitespace-nowrap">
                            Admin
                    </span>
                </div>
            </div>
            <div>
                <!-- <left-arrow-icon
                    v-if="sidebarFullView"
                    class="mt-[5rem] cursor-pointer"
                    @click="collapseSidebar"
                />
                <RightArrowIcon
                class="mt-[5rem] cursor-pointer"
                @click="expandSidebar"
                v-else
                /> -->
                <left-collapse-icon
                    v-if="sidebarFullView"
                    class="mt-[5rem] cursor-pointer"
                    @click="collapseSidebar"
                />
                <right-collapse-icon
                    class="mt-[5rem] cursor-pointer"
                    @click="expandSidebar"
                    v-else
                />
            </div>
            <hr class="mt-8 ml-[-15px] calc(100%_-5px) mb-5" />
            <SidebarMenuItem
                routeName="accounts.index"
                activeText="Accounts"
            >
                <AccountIcon />
                <span class="hide-on-collapse whitespace-nowrap" style="word-wrap:break-word;white-space: normal;">Account</span>
            </SidebarMenuItem>
            <SidebarMenuItem
                routeName="accounts.report"
                activeText="Report"
            >
                <ReportIcon />
                <span class="hide-on-collapse whitespace-nowrap" style="word-wrap:break-word;white-space: normal;">Report</span>
            </SidebarMenuItem>

        </div>
    </nav>
</template>

<script setup>
// import LeftArrowIcon from "../Icons/LeftArrow.vue";
// import RightArrowIcon from "../Icons/RightArrow.vue";
import LeftCollapseIcon from "../Icons/LeftCollapseIcon.vue";
import RightCollapseIcon from "../Icons/RightCollapseIcon.vue";
import ManIcon from "../Icons/Man.vue";
import AccountIcon from "../Icons/AccountIcon.vue";
import { ref } from "@vue/reactivity"

import SidebarMenuItem from "./SidebarMenuItem.vue";
import ReportIcon from "../Icons/SupplierIcon.vue";

const sidebarFullView = ref(true);
const collapseSidebar = () => sidebarFullView.value = false
const expandSidebar = () => sidebarFullView.value = true

</script>

<style lang="scss">
.collapse-nav {
    .hide-on-collapse {
        display: none;
    }
}
</style>
