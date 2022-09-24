function data() {
  return {
    isSideMenuOpen: false,
    toggleSideMenu() {
      this.isSideMenuOpen = !this.isSideMenuOpen;
    },
    closeSideMenu() {
      this.isSideMenuOpen = false;
    },
    // isProfileMenuOpen: false,
    // toggleProfileMenu() {
    //   this.isProfileMenuOpen = !this.isProfileMenuOpen;
    // },
    // closeProfileMenu() {
    //   this.isProfileMenuOpen = false;
    // },
    isPagesMenuOpen: false,
    togglePagesMenu() {
      this.isPagesMenuOpen = !this.isPagesMenuOpen;
    },
  };
}
