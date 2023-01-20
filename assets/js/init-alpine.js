function data() {
  function getThemeFromLocalStorage() {
    // if user already changed the theme, use it
    if (window.localStorage.getItem('dark')) {
      return JSON.parse(window.localStorage.getItem('dark'))
    }

    // else return their preferences
    return (
      !!window.matchMedia &&
      window.matchMedia('(prefers-color-scheme: dark)').matches
    )
  }

  function setThemeToLocalStorage(value) {
    window.localStorage.setItem('dark', value)
  }

  return {
    dark: getThemeFromLocalStorage(),
    toggleTheme() {
      this.dark = !this.dark
      setThemeToLocalStorage(this.dark)
    },
    isSideMenuOpen: false,
    toggleSideMenu() {
      this.isSideMenuOpen = !this.isSideMenuOpen
    },
    closeSideMenu() {
      this.isSideMenuOpen = false
    },
    isNotificationsMenuOpen: false,
    toggleNotificationsMenu() {
      this.isNotificationsMenuOpen = !this.isNotificationsMenuOpen
    },
    closeNotificationsMenu() {
      this.isNotificationsMenuOpen = false
    },
    isProfileMenuOpen: false,
    toggleProfileMenu() {
      this.isProfileMenuOpen = !this.isProfileMenuOpen
    },
    closeProfileMenu() {
      this.isProfileMenuOpen = false
    },
    isPagesMenuOpen: false,
    togglePagesMenu() {
      this.isPagesMenuOpen = !this.isPagesMenuOpen
    },
    // Modal Profile
    isModalOpen: false,
    trapCleanup: null,
    openModal() {
      this.isModalOpen = true
      this.trapCleanup = focusTrap(document.querySelector('#modal'))
    },
    closeModal() {
      this.isModalOpen = false
      this.trapCleanup()
    },
    // Modal Password
    isModalPasswordOpen: false,
    trapCleanup: null,
    openModalPassword() {
      this.isModalPasswordOpen = true
      this.trapCleanup = focusTrap(document.querySelector('#modalPassword'))
    },
    closeModalPassword() {
      this.isModalPasswordOpen = false
      this.trapCleanup()
    },

    // Modal edit kelas
    isModalEditKelasOpen: false,
    trapCleanup: null,
    openModalEditKelas() {
      this.isModalEditKelasOpen = true
      this.trapCleanup = focusTrap(document.querySelector('#modalEditKelas'))
    },
    closeModalEditKelas() {
      this.isModalEditKelasOpen = false
      this.trapCleanup()
    },
    // Modal tambah kelas
    isModalTambahKelasOpen: false,
    trapCleanup: null,
    openModalTambahKelas() {
      this.isModalTambahKelasOpen = true
      this.trapCleanup = focusTrap(document.querySelector('#modalTambahKelas'))
    },
    closeModalTambahKelas() {
      this.isModalTambahKelasOpen = false
      this.trapCleanup()
    },

    // Modal edit mapel
    isModalEditMapelOpen: false,
    trapCleanup: null,
    openModalEditMapel() {
      this.isModalEditMapelOpen = true
      this.trapCleanup = focusTrap(document.querySelector('#modalEditMapel'))
    },
    closeModalEditMapel() {
      this.isModalEditMapelOpen = false
      this.trapCleanup()
    },
    // Modal tambah mapel
    isModalTambahMapelOpen: false,
    trapCleanup: null,
    openModalTambahMapel() {
      this.isModalTambahMapelOpen = true
      this.trapCleanup = focusTrap(document.querySelector('#modalTambahMapel'))
    },
    closeModalTambahMapel() {
      this.isModalTambahMapelOpen = false
      this.trapCleanup()
    },
  }
}
