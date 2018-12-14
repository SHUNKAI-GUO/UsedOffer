json.extract! transaction, :id, :name, :price, :category, :condition, :description, :picture, :item, :user_id, :created_at, :updated_at
json.url transaction_url(transaction, format: :json)
