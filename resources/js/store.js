export default {
  state: {
    lastSearch: {
      from: '',
      to: '',
    },
    basket: {
      items: [],
    }
  },
  mutations: {
    setLastSearch(state, payload) {
      state.lastSearch = payload;
    },
    addToBasket(state, payload) {
      state.basket.items.push(payload);
    },
    removeFromBasket(state, payload) {
      state.basket.items = state.basket.items.filter(item => item.bookable.id !== payload);
    },
    setBasket(state, payload) {
      state.basket = payload;
    }
  },
  actions: {
    setLastSearch(context, payload) {
      context.commit('setLastSearch', payload);
      localStorage.setItem('lastSearch', JSON.stringify(payload));
    },
    loadStoredLastSearch(context) {
      const lastSearch = localStorage.getItem('lastSearch');
      if (lastSearch) {
        context.commit('setLastSearch', JSON.parse(lastSearch));
      }

      const basket = localStorage.getItem('basket');
      if (basket) {
        context.commit('setBasket', JSON.parse(basket))
      }
    },
    addToBasket(context, payload) {
      const { state, commit, ...rest } = context;
      commit('addToBasket', payload);
      localStorage.setItem('basket', JSON.stringify(state.basket))
    },
    removeFromBasket(context, payload) {
      const { state, commit, ...rest } = context;
      commit('removeFromBasket', payload);
      localStorage.setItem('basket', JSON.stringify(state.basket))
    },
  },
  getters: {
    itemsInBasket: (state) => state.basket.items.length,
    inBasketAlready: (state) =>
      (id) => {
        return state.basket.items.reduce(
          (result, item) =>
            result || item.bookable.id === id,
          false
        );
      }
  }
}