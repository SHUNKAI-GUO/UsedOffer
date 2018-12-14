Rails.application.routes.draw do
 

  resources :transactions
  resources :items
  resources :models
  get 'home/index'

  devise_for :users

  root 'home#index'
  get '/about', to: 'static_pages#about'
  get '/index', to: 'home#index'
  get '/item', to: 'items#browseAll'
  get '/user', to: 'users#index'
  get '/account', to: 'users#account'
  get '/post_item', to: 'items#new'
  get '/browse_all', to: 'items#index'
  get '/item_details', to: 'items#show'
  get '/destroy_items', to: 'items#destroy'
  get '/manage_items', to: 'items#manage'
  get '/view_cart', to: 'carts#index'
  get '/add_to_cart', to: 'carts#create'
  get '/clear_cart', to: 'carts#clear'
  get '/cart_details', to: 'carts#show'
  get '/check_out', to: 'transactions#updateTransaction'
  get '/transaction_record', to: 'transactions#create'
  get '/view_transactions', to: 'transactions#index'
  get '/list',to:'books#index'
  get '/search', to: 'home#search'
  get '/invalidManage', to: 'items#invalidManage'
  resource :users
  resource :items
  resource :carts
  # For details on the DSL available within this file, see http://guides.rubyonrails.org/routing.html
end
